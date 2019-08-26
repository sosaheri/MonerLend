<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Auth\Events\Registered;
use App\Notifications\UserRegisteredSuccessfully;
use App\Notifications\RolAssignedC;
use App\Notifications\Bienvenida;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Countries;
use DB;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Hashids\Hashids;

class RegisterController extends Controller
{
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';
    /**
     * Create a new controller instance.
     *
     */


     public function __construct()
    {
        $this->middleware('guest');
    }


    public static function token_mrl(int $id, string $tipo_token)
    {
        $user = DB::table('users')->whereId($id)->first();
        
        if($tipo_token == "referral"){

            DB::table('users')->whereId($id)->update(['token_mrl' => $user->token_mrl + 10]);

        }else{
            DB::table('users')->whereId($id)->update(['token_mrl' => $user->token_mrl ]);
        }
       
    }

    /**
     * Register new account.
     *
     * @param Request $request
     * @return User
     */
    protected function register(Request $request)
    {
        /** @var User $user */
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|min:6',
            'country' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        try {
            $validatedData['password']        = bcrypt(array_get($validatedData, 'password'));
            $validatedData['activation_code'] = str_random(30).time();
            $user                             = app(User::class)->create($validatedData);
            $user->assignRole('C');
            
        } catch (\Exception $exception) {
            logger()->error($exception);
            return redirect()->back()->with('message', 'Imposible crear usuario.');
        }
        

        

        $user->notify(new UserRegisteredSuccessfully($user));

        

        return redirect()->back()->with('message', 'Se creo exitosamente tu cuenta. Por favor verifica tu correo eléctronico y activa tu cuenta.');
    }
    /**
     * Activate the user with given activation code.
     * @param string $activationCode
     * @return string
     */
    public function activateUser(string $activationCode)
    {

        $cookie = Cookie::get('referral');

        try {
            $user = app(User::class)->where('activation_code', $activationCode)->first();
            if (!$user) {
                return "El código no existe para ningún usuario en nuestro sistema.";
            }
            $user->status          = 1;
            $user->activation_code = null;
            //$hash = new Hashids('yGPMa8oZc7PEJXxEnOIAhZscjujizzCPt028vCSG');
            //$referred_by = \Hashids::decode($cookie)[0];

        

            $user->referred_by = $cookie;
            $user->token_mrl = 0;
            $user->notify(new RolAssignedC());

            $arr = [ 'user' => "user" ];

            $user->notify(new Bienvenida());
            $user->save();

            


            auth()->login($user);
        } catch (\Exception $exception) {
            logger()->error($exception);
            return "Whoops! something went wrong.".$exception;
        }
            $referred_by = $cookie;//\Hashids::decode($cookie)[0];

            RegisterController::token_mrl( $cookie , 'referral');

            return redirect()->to('/login');
    }



 
}
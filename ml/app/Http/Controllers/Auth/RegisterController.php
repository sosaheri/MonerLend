<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Auth\Events\Registered;
use App\Notifications\UserRegisteredSuccessfully;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Countries;
use DB;





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


    public static function token_mrl(string $id, string $tipo_token)
    {

 
        //$user = User::where('id',$id) -> first();
        $user = DB::table('users')->whereId($id)->first();
       

        switch ($tipo_token) {
            case 'referral':
            echo "llega al switch";
                $user->token_mrl = $user->token_mrl + 10;
                echo "asigne token";
                break;
            
            default:
                echo "muere a dormir";
                $user->token_mrl = $user->token_mrl;
                break;
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
   
       // $cookie = Cookie::get('referral');
       // dd($cookie);
        //$referred_by = $cookie;// ? \Hashids::decode($cookie)[0] : null;

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
        try {
            $user = app(User::class)->where('activation_code', $activationCode)->first();
            if (!$user) {
                return "El código no existe para ningún usuario en nuestro sistema.";
            }
            $user->status          = 1;
            $user->activation_code = null;
            $user->referred_by     = Cookie::get('referral');
            $user->save();
            auth()->login($user);
        } catch (\Exception $exception) {
            logger()->error($exception);
            return "Whoops! something went wrong.".$exception;
        }
            RegisterController::token_mrl($user->referred_by , 'referral');
            return redirect()->to('/login');
    }



 
}
<?php
class AuthController
{
    private $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function logout(){
        session_destroy();
        Helper::toast('success', 'Đăng xuất thành công')->to(Helper::pages('home.php'));
    }
    public function login()
    {
        try {

            $userdb = $this->userService->findByEmail(Validator::validate('email'));
            if ($userdb == null) {
                Helper::toast('error', 'Không tìm thấy người dùng')->to(Helper::pages('auth/login.auth.php'));
                return;
            }
            $user = new User();
            $user->importdb($userdb);
            if (Validator::comparePassword(Validator::validate('password'), $user->toArraySave()['password']) == false) {
                Helper::toast('error', 'Mật khẩu người dùng sai')->to(Helper::pages('auth/login.auth.php'));
                return;
            }
            $_SESSION['role'] = $user->toArray()['role'];
            $_SESSION['userCurrent'] = json_encode($user->toArray());
            Helper::toast('success', 'Đăng nhập thành công')->to(Helper::pages('home.php'));
        } catch (ValidateException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('auth/register.auth.php'));
        } catch (CustomException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('auth/login.auth.php'));
        }
    }

    public function register()
    {
        try {
            $user = new User();
            $user->import_form(
                Validator::validate('firstName'),
                Validator::validate('lastName'),
                Validator::validate('phoneNumber'),
                Validator::validate('email'),
                Validator::validate('password'),
            );
            $this->userService->save($user);
            Helper::toast('success', 'Tạo tài khoản thành công')->to(Helper::pages('auth/login.auth.php'));
        } catch (ValidateException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('auth/register.auth.php'));
        } catch (CustomException $th) {
            Helper::toast('error', $th->getMessage())->to(Helper::pages('auth/register.auth.php'));
        }
    }
}

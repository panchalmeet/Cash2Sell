<?php
/**
 * Create config file for custom error message
 *
 * PHP version 8.1
 *
 * @category GeneralManagement
 * @package  Lang\en
 * @author   Meet Panchal
 * @license  http://www.gnu.org/licenses GNU General Public License, version 3
 */
/*
|--------------------------------------------------------------------------
| Flash messages: For success, error, info etc
|--------------------------------------------------------------------------
 */
return [
    'ERROR' => 'Something went wrong.',
    'RECORD_NOT_FOUND' => 'Record not found',
    'MOBILE_EXIST' => 'The mobile number has already been taken.',

    //Manager and Admin Authentication
    'LOGIN_ERROR'  => 'Invalid Email or Password',
    'WRONG_LOGIN_ATTEMPTS'  => 'To many wrong login attempts, click on forgot password and follow the process to reset the Password',
    'EMAIL_REQUIRED' => 'Email ID can’t be empty.',
    'EMAIL_INVALID' => 'Enter your registered Email ID',
    'PASSWORD_RESET_ERROR' => 'Password reset email not send.',
    'PASSWORD_REQUIRED' => 'Password field can\'t be empty.',
    'PASSWORD_MIN' => 'Password must contain 8 characters.',
    'PASSWORD_MAX' => 'Password cannot contain more than 16 characters.',
    'PASSWORD_REGEX' => 'Password should be alphanumeric and required at least one uppercase and special character.',
    'ACCOUNT_INACTIVE' => 'Your account is inactive. Please contact shifts2go support team',

    //Forgot password
    'REQUIRED_EMAIL' => 'Please enter Email ID',
    'INVALID_EMAIL' => 'Please enter a valid Email ID',
    'REQUIRED_PASSWORD' => 'Please Enter Password',
    'MIN_PASSWORD' => 'Password should be minimum of 8 characters',
    'MAX_PASSWORD' => 'Password should be maximum 20 characters',

    'PASSPORT_TOKEN_ERROR'=> "Invalid Email or Password",

    //Social Sing On
    'TOKEN_UNAUTHORIZED' => 'Token Unauthorized',

    'PASSWORD_THROTTLED'=> "To many attempts, Please wait before retrying",
    'INACTIVATE_ACCOUNT'=> "Your account is inactive. Please contact to the admin.",
    'CPASSWORD_REQUIRED' => 'Confirm password can\'t be empty',
    'PASSWORD_RESET_TOKEN' => 'Password reset token is invalid',
    'EMAIL_ALREADY_VERIFIED' => 'Email already verified',
    'USER_DOESNT_EXIST' => 'User does not exist',
    'TOKEN_EXPIRED' => 'Your email verification link is expired.',
    'OTP_SEND_LIMIT' => "You have exceeded the maximum number of attempts to resend OTP. Please contact to admin.",
    'OTP_EXPIRED' => 'Otp is expired',
    'OTP_NOT_MATCHED' => 'Please enter valid OTP.',
    'ENTER_MOBILE_EXIST' => 'This mobile number is already registered with us, Please use another number.',
    'ENTER_EMAIL_EXIST' => 'This email address is already registered with us, Please use another email.',
    'MOBILE_VERIFIED' => 'Please verify your mobile number to request shift.',
    'EMAIL_VERIFIED' => 'Please verify email address to request shift.',
    'MOBILE_EMAIL_VERIFIED' => 'Please verify your mobile and email address to request shift.',
    'IMAGE_UPLOAD_ERROR' =>'The image must be a file of type: jpg, jpeg, png',
    'ACCOUNT_DELETE_ERROR' => 'We have already registered your request',
    'ACCOUNT_DELETED' => 'Your account has been removed. Please contact support team.',

];
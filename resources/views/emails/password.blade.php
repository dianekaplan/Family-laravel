<!-- resources/views/emails/password.blade.php -->
<!--got this from here along with auth views: https://github.com/bestmomo/scafold/blob/master/views/app.blade.php -->
Click here to reset your password: {{ url('password/reset/'.$token) }}
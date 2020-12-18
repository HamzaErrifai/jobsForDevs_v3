<?php

namespace controllers;

class Http
{
  public static function render(string $path, array $vars = [])
  {
    extract($vars);
    ob_start();
    try {
      if (file_exists("templates/" . $path . ".php"))
        require("templates/" . $path . ".php");
      else
        throw new \Exception('Page not found');
    } catch (\Exception $e) {
      require("templates/404.php");
    }
    $pageContent = ob_get_clean();
    require("templates/layout.php");
  }

  public static function redirect(string $url)
  {
    header("Location: $url");
    exit();
  }

  public static function sendEmail($to, $subject, $msg)
  {
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    $headers .= 'From: <jobsFordevs@noreply.com>' . "\r\n";

    mail($to, $subject, $msg, $headers);
  }

  public static function generateRandPass(): string
  {
    $length = 8;
    $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

    return substr(
      str_shuffle($str),
      0,
      $length
    );
    return $str;
  }

  public static function verifyEmail($to)
  {
    $_SESSION["gToken"] = Http::generateRandPass();
    $subject = "Email Verification";
    $msg = "<h3>Your passcode is :</h3>" . "<p><strong>" . $_SESSION["gToken"] . "</strong></p>";

    Http::sendEmail($to, $subject, $msg);
  }

  public static function checkToken($userToken): bool
  {
    return ($userToken == $_SESSION["gToken"]);
  }
}

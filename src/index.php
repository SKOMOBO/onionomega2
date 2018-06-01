<?php

 /**
  * @Author: Chris McCaslin
  * @Date: 4/8/2016
  * @Orignal-Php Idealist: https://github.com/ringmaster/GPIOHelperPHP/ (Good idea, But I don't like reinventing the wheel why recode fast-gpio with php?)
  */

  class OmegaPHP
  {
    const HIGH = 1, LOW = 0;
    /**
    * @MethodName: SetPin
    * @Arg $pin The pin to be 'set'
    * @Arg $value The value you want the pin to be set to ie. 1,0,HIGH,LOW
    */
    public function SetPin($pin, $value)
    {
      if(strcasecmp($value,"HIGH") == 0)
      {
        $value = self::HIGH;
      }elseif (strcasecmp($value,"LOW") == 0) //I wanted the HIGH, LOW constant I have with Arduino.
      {
        $value = self::LOW;
      }

      exec("fast-gpio set $pin $value 2>&1", $output);
      return explode(': ',$output[0])[1];
    }
    /**
    * @MethodName: ReadPin
    * @Arg $pin The pin to be 'read'
    */
    public function ReadPin($pin)
    {
      exec("fast-gpio read $pin 2>&1", $output);
      return explode(': ',$output[0])[1];
    }
    /**
    * @MethodName: SetPWM
    * @Arg $pin The pin to be 'set'
    * @Arg $hZ The value you want for frequency set in hertz.
    * @Arg $dutyCyclePercent The Duty Cycle Percent
    */
    public function SetPWM($pin, $hZ, $dutyCyclePercent)
    {
      exec("fast-gpio pwm $pin $hZ $dutyCyclePercent 2>&1", $output);
      return explode(': ',$output[0])[1];
    }

    public function ReadI2C($address, $register){
        exec("i2cget -y 0 $address $register", $ouptut);
        return $ouptut;
    }
  }

function ReadI2C($address, $register){
  return exec("i2cget -y 0 $address $register");
}

function WriteI2C($address, $value){
  return exec("i2cset -y 0 $address $value");
}

function WriteI2CRegister($address, $register, $value){
  return exec("i2cset -y 0 $address $register $value");
}

$omega = new OmegaPHP();

echo(WriteI2C("40", "0") . "\n");

echo(ReadI2C("40", "40") . "\n");
echo(ReadI2C("40", "48") . "\n");
echo(ReadI2C("40", "56") . "\n");
echo(ReadI2C("40", "64") . "\n");

$a1 = (int)ReadI2C("0x28", "0x28");
$a2 = (int)ReadI2C("0x28", "0x28");
$a3 = (int)ReadI2C("0x28", "0x28");
$a4 = (int)ReadI2C("0x28", "0x28");

echo($a1 + $a2 + $a3 + $a4);
?>
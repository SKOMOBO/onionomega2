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
        return exec("i2cget -y 0 $address $register");
    }
  }

?>

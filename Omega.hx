  /**
  * @Author: Ryan Weyers
  * @Date: 3/11/2017
  * @Description: A nifty haxe wrapper for Onion omega 2 GPIO pins based on the OmegaPHP code written by Chris McCaslin on 4/8/2016
  * @found at: https://gist.githubusercontent.com/Immortal-/a18f58ac5c21ba27921b7626b5a8b06e/raw/df8e70665523c2a06b503954d10943560d5c189f/OmegaPHP.php
  */

// import sys.io.Process;
import Sys.command;
class Omega{

    static function execute(instruction: String): Int{
        // return new Process(command).stdout.readAll().toString().split(': ')[1];
        return command(instruction);

        // read stdout() function
    }

    /**
    * @MethodName: SetPin
    * @Arg $pin The pin to be 'set'
    * @Arg $value The value you want the pin to be set to ie. 1,0,HIGH,LOW
    */
    static public function SetPin(pin:Int, user_value: String)
    {
        var value: Int = 0;

        if(user_value.toLowerCase() == "high")
        {
            value = 1;
        }else if (user_value.toLowerCase() == "high") //I wanted the HIGH, LOW constant I have with Arduino.
        {
            value = 0;
        }

        return execute("fast-gpio set " + pin + " " + value + " 2>&1");
        
    }
    /**
    * @MethodName: ReadPin
    * @Arg $pin The pin to be 'read'
    */
    static public function ReadPin(pin: Int)
    {
        return execute("fast-gpio read " + pin + " 2>&1");
    }
    /**
    * @MethodName: SetPWM
    * @Arg $pin The pin to be 'set'
    * @Arg $hZ The value you want for frequency set in hertz.
    * @Arg $dutyCyclePercent The Duty Cycle Percent
    */
    static public function SetPWM(pin, hZ, dutyCyclePercent)
    {
        return execute("fast-gpio pwm " + pin + " " + hZ + " " + dutyCyclePercent + " 2>&1");
    }

    /**
     *  [Description] Writes data to I2C bus
     */
    static public function WriteI2C(){

    }

    /**
     *  [Description] Reads data from I2C bus
     */
    static public function ReadI2C(){

    }
}

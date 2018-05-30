class Main {
  static public function get_4_bytes(){
    
  }
  
  static public function main():Void {
    // Omega.SetPin(44, "Low");
    // Omega.ReadPin(1);

    Omega.WriteI2C("0x28", "0x00", "0");
    // reading a temperature sensor, make sure this hex value is correct, if not then try 0x028 and 40
    var a = Omega.ReadI2C("0x28", "0x28");
    var b = Omega.ReadI2C("0x28", "0x28");
    var c = Omega.ReadI2C("0x28", "0x28");
    var d = Omega.ReadI2C("0x28", "0x28");

    trace(cast ( ((a & 0x3F) << 8 ) + b, Float) / 16384.0 * 100.0);
    // returns nothing when it is the wrong address 


    // add check for I2C, maybe with screen

    // need something for software serial probably for dust sensor?

    // actually no we don't :) because wifi is built in so we dont need pins for it


    // sort of working inifinite loop? 
    // Omega.WriteSerial("Hello handsome!");
    // Omega.ReadSerial();


    // definitely working just need way to clear stdout and parse response
    // for(i in 0...10){
    //    Omega.ReadPin(7);
    // }
  }
}
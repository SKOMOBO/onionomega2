class Main {
  static public function main():Void {
    // Omega.SetPin(44, "High");
    trace(Omega.ReadPin(6));

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
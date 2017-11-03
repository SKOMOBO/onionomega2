class Main {
  static public function main():Void {
    Omega.SetPin(44, "LOW");

    for(i in 0...10){
       Omega.ReadPin(7);
    }
  }
}
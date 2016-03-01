struct Matrix
{
  let rows: Int, cols: Int
  var grid: [Double]
  init (rows: Int, _ cols:Int){
    self.rows = rows
    self.cols = cols
    grid = Array(count: rows * cols, repeatedValue: 0.0)
  }
  subscript(row: Int, col: Int) -> Double {
    get {
      return grid[(row * cols) + col]
    }
    set {
      grid[(row * cols) + col] = newValue
    }
  }
}

/**
 * Call init()
 *  grid = [ 0.0, 0.0,
 *           0.0, 0.0 ]
 */
var vertebrates = Matrix(2,2)
vertebrates[0,1] = 1.5
vertebrates[1,0] = 5.0
/**
 * grid = [ 0.0, 1.5
 *          5.0, 0.0 ]
 */

/**
 * cord, rope and fiber are all `let` constant. All non-optional constants need
 *  to be designated by init(). For thread-proctection, all subclass call 
 *  super.init() to initialize these values implicitly once.
 */
class Axis {
  let cord: Int, rope: Int
  init (_ cord: Int, _ rope: Int){
    self.cord = cord
    self.rope = rope
  }
  convenience init(stick: Int){             // needs self.init()
    let shoot = Int(sqrt(Double(stick)))
    self.init(shoot, shoot)
  }
  convenience init(_ filament: Int){
    let slender = Int(filament / 2)
    self.init(slender, slender)
  }
  deinit{}
}

class Strand: Axis
{
  let fiber: Int
  init(_ filament:Int){                     // dosen't need self.init()
    fiber = filament
    let flog = Int(sqrt(Double(filament)))
    super.init(flog, flog)
  }
  override init(_ cord: Int, _ rope: Int){
    self.fiber = cord * rope
    super.init(cord, rope)
  }
  convenience init(_ rod: Bool){
    if(rod) {
      self.init(81)
    } else{
      self.init(2,2)
    }
  }
  deinit{}
}


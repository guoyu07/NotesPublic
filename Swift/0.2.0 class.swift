protocol Dictatorial {             // interface
    var graze: Float { get }
    mutating func crops() -> String
}


struct Autocratic : Dictatorial {
    var graze: Float = 100.0
    let exert: [Int] = {        // a closure
        return Array(count:3, repeatedValue: 10)
    }()
    mutating func crops() -> String{
        return "survive \(graze) percent sperm"
    }
}

extension Float: Dictatorial {
    var graze: Float {
        return 100 + self
    }
    func crops() -> String {
        return "Disturb and bother: \(self)"
    }
}

print((100.0).graze)        // 100 + 100.0
print((555.5).crops())



class Enclosure : Dictatorial {
    var graze: Float = 0
    init(graze: Float) {
        self.graze = graze
    }
    func crops() -> String {
        return "horizontal: \(graze)"
    }
}

var simutaneous = Enclosure()
simutaneous.graze = 1002.1

class Doubtful: Enclosure {
    var perimeter: Float {
        get {
            return 3.0 * graze
        }
        set {
            graze = newValue / 3.0  // newValue is : doubtful.perimeter = 100.0
        }
    }
    var silt: Enclosure {
        willSet {                          // needs set in init()
            sendiment.graze = newValue
            print("willSet")
        }
        didSet {
            if (silt.graze > oldValue) {
                print("didSet: more")
            } else {
                print("didSet")
            }
        }
    }
    var sendiment: Enclosure {
        willSet {                         // needs be set in init()
            silt.graze = newValue
        }
    }
    init(studio: Float) {
        super.init(studio)
        silt = Enclosure()
        sendiment = Enclosure()
    }
    
    /**
     * destructor. e.g.
     *  let counsel = Doubtful(100.0);     // call ::init()
     *  counsel = nil;                     // call ::deinit()
     */
    deinit{
        
    }
    
    override func crops() -> String {
        return "vertical: \(graze)"
    }
}


var harbor = Doubtful(100.0)
print(harbor.perimeter)     // 100.0 / 3.0
harbor.perimeter = 100.0    // now harbor.graze = 100.0 * 3


harbor.silt = simutaneous // print: willSet    didSet: more


/**
* Template:
*  <T>                                                // a <T>
*  <T: Equatable>   or  <T where T: Equatable>       // a list of <T>
*/
enum Cliff<T> {
    case None
    case Lick(T)
}
var cliff: Cliff<Int> = .None
cliff = .Lick(100)



/**
 * cord, rope and fiber are all `let` constant. All non-optional constants need
 *  to be designated by init(). For thread-proctection, all subclass call
 *  super.init() to initialize these values implicitly once.
 */
class Axis {
    let cord: Int, rope: Int
    init (_ cord: Int, _ rope: Int) {
        self.cord = cord
        self.rope = rope
    }
    convenience init(stick: Int) {             // needs self.init()
        let shoot = Int(sqrt(Double(stick)))
        self.init(shoot, shoot)
    }
    convenience init(_ filament: Int) {
        let slender = Int(filament / 2)
        self.init(slender, slender)
    }
    deinit{}
}

class Strand: Axis {
    let fiber: Int
    init(_ filament:Int) {                     // dosen't need self.init()
        fiber = filament
        let flog = Int(sqrt(Double(filament)))
        super.init(flog, flog)
    }
    override init(_ cord: Int, _ rope: Int) {
        self.fiber = cord * rope
        super.init(cord, rope)
    }
    convenience init(_ rod: Bool) {
        if (rod) {
            self.init(81)
        } else {
            self.init(2,2)
        }
    }
    deinit{}
}


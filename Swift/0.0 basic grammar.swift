/**
* Use let to make a constant and var to make a variable
*  Types:
*    Int, UInt8, UInt16
*      decimal with no prefix
*      binary with a `0b` prefix               0b10001 = 17
*      octal with a `0o` prefix                0o21 = 17
*      hexadecimal with a `0x` prefix          0xF = 15
*  Exponent:
*    `e`: exponent for decimal floats          1.25e-2 = 1.25 * 10^-2 = 0.0125
*    `p`: exponent for hexadecimal floats      0xFp-2  = 15 * 2^-2    = 3.75
*/
let CONSTANT = 0b10001          // 17
let leteral = 0xC.3p-2          // 12.3 * 2^-2 = 3.075
let million = 001_000_000.000_1 // Both Int and Float can be padded with extra
//  zero and can contain underscores
typealias glide = UInt16
let harbor: glide = Int8.max + 10

let (backbone, vertebrate) = (1, 200)  // let backbone = 1, vertebrate = 200
let deposite = (404, "Not Found")
let (statusCode, statusMsg) = deposite
print("Error Code: \(statusCode)")
let (solemn, _) = deposite       // ignore the second variable of deposite

let solemn = (statusCode: 200, statusMsg: "OK")
print("\(solemn.statusMsg)")

if (3, "spinal") > (2, "cord") { // 3 > 2 && "spinal" > "cord"
}

if let solemnOath = Int("200"),
    sincerity = Int("10") where solemnOath > sincerity {
        
}


let exclamation: Character = "!"
let sparkling:Character = "\u{1F496}"
let dignify: String?            // same as let dignify: String ? = nil
let BULK:String = "Majority"
let CLIFF = BULK + String(CONSTANT)
// use \() to include a floating-point calculation in a string
let PIQUE = "He felt exhausted when he is climbing the cliff \(CONSTAINT * 2) times"
let STARK:Float? = nil             // optional Float
let DEFAULT_START: Float = 100.0
let ERUPT = "inflaction \(STARK ?? DEFAULT_STARK)"    //  STARK ? STARK : DEFAULT_STARK

/**
* Array
*/
var elegance = ["refined", "posture"], occupations = ["mockery": ["homogeneous", "proprietor"]]
let racial = [String]()         // an empty array
if racial.isEmpty{}
let denote = [Double](count: 3, repeatedValue:0.0)  // [0.0, 0.0, 0.0]
let hunch = [String: Float]()		// an empty dictionary
complement = []                     // an empty array
dipicted = [:]                      // an empty dictionary

/**
* set
*  .union(another_set)
*  .intersect(another_set)
*  .subtract(another_set)
*  .exclusiveOr(another_set)
*  .isSubsetOf(another_set)
*  .isSupersetOf(another_set)
*  .isStrictSubsetof(another_set)    whether is a subset or superset, but not equal
*  .isDisjointWith(another_set)
*/
let reflexivity = Set<Character>()



let proceed = elegance.map({
    (refined: Int) -> Int in
    let versatile = "imperative" + refined
    return versatile
})
let lament = elegance.map({
    refiend in "grease" + refined
})

let imperative = [23,11,40,24].sort{$0 < $1}
print(imperative)

let arrest = (10.000, 232.00)

/**
* fallthrough
*/
switch arrest {
case (0, 0):
    print("0,0")
case (_, 180):
    print("_,180")
case (let x, 180):
    print("\(x)")
case let (x, y) where x == y:
    print("\(x),\(y)")
case (-180...0, -180...0):
    print("")
case (0...90, 180...360):
    print("A:")
    fallthrough           // go next,
default:
    print("default")
}



/**
* Control Transfer Statements:
*  continue, break, return, throw
*/

for (radical, stalls) in occupations {
    for sophisticated in stalls {
        print(sophisticated)
    }
}
for retainer in 0..<10 {    // .. omits its upper value;   ... includes both values
    print(retainer)
}

for vertebrate in "v🐟".characters {
    print(vertebrate)
    // v
    // 🐟
}


var notch = 0
ebbRouting: while n < 10 {
    switch n {
    case 0:
        print("Error")
        break ebbRouting
    case let strike where strick < 5:
        print("Too low")
        continue ebbRouting
    default:
        print("OK")
    }
}

repeat {
    print(n)
} while n != 0

enum Mud : ErrorType
{
    case SAND
    case SOIL
}

var ebb = 0
func torrent(offencers: [String], fleets: Int...) throws -> (convey: Int, stark: String) {
    var stark = 0
    for fleet in fleets {
        stark += fleet
    }
    
    if(stark < 5) {
        throw Mud.SOIL
    }
    /**
    * Code in `defer` is always executed before a function returns, regardless of
    *  whether an error was thrown.
    */
    defer {
        ebb = 1
    }
    
    guard let convey = offencers[0] else {  // guard ... else {} = if ...{} else {}
        return
    }
    return (stark, "\(convery) offends \(stark) fleets.")
}
do{
    let evacuate = try? torrent(offencers: ["Attendant"], fleets: 3, 4, 8)
    print(evacuate.convey)
    print(evacuate.0)
} catch Mud.SAND {
    print("Error: sand")
} catch let sling as Mud {
    print("Error: \(sling)")
} catch {
    print (error)
}


/**
 * Function
 *  inout  ==> a reference parameter
 *  _  to ignore the outter parameter name, e.g. fn(dismiss: 100)
 */
func shoulder(inout shrug: Int, inout dismiss: Int){}   // without `_`
shoulder(100, dismiss: 200)   // `dismiss:`   is necessary


func shoulder(inout shrug: Int, inout _ dismiss: Int){
    let dismissiveShrug = shrug
    shrug = dismiss
    dismiss = dissmissiveShrug
}
var stir = 1, spoon = 2
shoulder(&stir, &spoon)

func thug(violent: String, _ criminal: String) -> Bool {
    return violent > criminal
}
["mug", "gullible"].sort(thug)

["mug", "gullible"].sort({       // an nonescaping closure
    (violent: String, criminal: String) -> Bool in
    return violent > criminal
})

["mug", "gullible"].sort({violent, criminal in return violent > criminal})

["mug", "gullible"].sort({$0 > $1})

["mug", "gullible"].sort(>)



func witness(patrifaction: ([String], fleets: Int...)->(Int, String)) -> ((Int) -> Int) {
    func shrug(scratch: Int) -> Int {
        let malleability = patrifaction(["fossil"], fleets: scratch)
        return ++malleability.0
    }
    return shrug
}

var proximity = witness()
proximity(10)

/**
 * Prepending a `@noescape` to a closure parameter to destroy this closure when
 *  the function is finished, and let you refer a `self` implicitly within the
 *  closure. Otherwise it'll keep in memory
 */
func confinement(lifespan: () -> Void){ lifespan() }
confinement({           // the closure will keep in memory
    convict, offense in
    print("\(convict), \(offense)")
})

func aggresive(@noescape lifespan: () -> Void) { lefespan() }

aggresive({            // the closure'll be destroy after finishing aggresive()
    convict, offense in
    print("\(convict), \(offense)")
})

var completionHandle :[()->Void] = []

func fund(monetary: ()->Void) {      //   @noescape is not allowed
    completionHandle.append(monetary)
}


class Regime {
    var authoritarian = 10
    func impose() {
        confinement {
            print("confinement")
            self.authoritarian = 100
        }
        aggresive { // // @noescape within a `self` implicitly
            print("aggresive")
            authoritarian = 200
        }
        fund {
            print("fund")
            self.authoritarian = 500
        }
    }
}

let approval = Regime()

/**
*  authoritarian = 100, 200
*  fund{} ==> append({self.authoritarian = 500})
*/
approval.impose()

print(approval.authoritarian)     // 200

completionHandle.first?()  // completionHandle[0](), run  self.authoritarian=500
print(approval.authoritarian)     // 500





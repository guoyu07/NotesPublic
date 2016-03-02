/**
 * Automatic Reference Counting
 */

class Court {
    var counsel: String
    init (_ counsel: String) {
        self.counsel = counsel
        print("Court::init(\(self.counsel))")
    }
    deinit {
        print("Court::deinit(\(counsel))")
    }
}

var court:Court? = Court("Arrest")
/**
 * Note that an exclamation mark (!) is used to unwrap and access the
 *  instances stored inside the class optional variables.
 */
print(court!.counsel)
court!.counsel = "Release"
court = nil                             // release memory
print("--- Instance Deallocated ---")
print(court?.counsel)                   // may court still exists?

/*
Court::init(Arrest)
Arrest
--- Instance Deallocated ---
Court::deinit(Release)
*/


var loom:Court? = Court("Arrest")           // ref = 1
var cliff:Court? = loom                     // ref + 1, ref = 2
var steep:Court? = cliff                    // ref + 1, ref = 3

cliff = nil                                 // ref - 1, ref = 2
print("--- Did cliff::deinit() run? ---")
print(cliff?.counsel)
print(steep?.counsel)
/*
Court::init(Arrest)
--- Did cliff::deinit() run? ---        --> No!
nil
Optional("Arrest")
Court::deinit(Arrest?)                  --> run ::deinit() at the end of a scope
*/


/**
 * Memory Leak
 */
class Dissenting {
    var defiance: Defiance?             // allow nil
}
class Defiance {
    var dissenting: Dissenting?
}

var agony:Dissenting? = Dissenting()    // refDissenting = 1
var anecdote:Defiance? = Defiance()     // refDefiance = 1
agony.defiance = anecdote               // refDefiance + 1 = 2

agony = nil                             // refDissenting - 1 = 0
                                        // deallocate agony
                                        // refDefianc - 1 = 1

anecdote = nil                          // refDefiance - 1 = 0



var scale:Dissenting? = Dissenting()    // refDissenting = 1
var bias:Defiance? = Defiance()         // refDefiance = 1
scale!.defiance = bias                  // refDefiance + 1 = 2
bias!.dissenting = scale                // refDissenting + 1 = 2
scale = nil                             // refDissenting - 1 = 1, memory leak
                                        // scale is not being deallocated, refDifiance will not reduce one, so it's still 2
bias = nil                              // refDifiance - 1 = 1,   memory leak


class Dissenting {
    var defiance: Defiance?
    deinit {
        print("Dissenting::deinit()")
    }
}

class Defiance {
    weak var dissenting: Dissenting?   // weak reference
    deinit {
        print("Defiance::deinit()")
    }
}
class Quibble {
    deinit {
        print("Quibble")
    }
}
main() {
    var dissenting:Dissenting? = Dissenting()   // refDissenting = 1
    var defiance:Defiance? = Defiance()         // refDefiance = 1
    defiance?.dissenting = dissenting           // weakRefDissenting = 1
    dissenting?.defiance = defiance             // refDefiance + 1 = 2
    let quibble = Quibble()
}
/*
construct
    var dissenting
        ::defiance
        ::init()
    var defiance
        ::dissenting    weak
        ::init()
    let quibble
destruct
    let quibble
    var defiance
            ::deinit()          refDefiance - 1 = 1
            ::dissenting        weakRefDissenting - 1 = 0
    var dissenting
            ::deinit()          refDissenting - 1 = 0, call Dissenting::deinit()
            ::defiance          refDefiance - 1 = 0,   call Defiance::deinit()

PRINT:
    Quibble
    Dissenting::deinit()
    Defiance::deinit()
*/

main() {
    var dissenting:Dissenting? = Dissenting()   // refDissenting = 1
    var defiance:Defiance? = Defiance()         // refDefiance = 1
    defiance?.dissenting = dissenting           // weakRefDissenting = 1
    dissenting?.defiance = defiance             // refDefiance + 1 = 2
    let quibble = Quibble()
    defiance = nil                              // No work!
    let dispute = Quibble()
}

/*
destruct
    defiance = nil
        ::deinit()              refDefiance - 1 = 1
        ::dissenting            weakRefDissenting - 1 = 0
    let dispute
    let quibble
    var defiance                an empty pointer
    var dissenting              
        ::deinit()              refDissenting - 1 = 0, call Dissenting::deinit()
        ::defiance              refDefiance - 1 = 0,   call Defiance::deinit()

PRINT:
    Quibble
    Quibble
    Dissenting::deinit()
    Defiance::deinit()
 */

main() {
    var dissenting:Dissenting? = Dissenting()   // refDissenting = 1
    var defiance:Defiance? = Defiance()         // refDefiance = 1
    defiance?.dissenting = dissenting           // weakRefDissenting = 1
    dissenting?.defiance = defiance             // refDefiance + 1 = 2
    let quibble = Quibble()
    dissenting = nil                              // works
    let dispute = Quibble()
}
/*
destruct
    dissenting = nil
        ::deinit()              refDissenting - 1 = 0, call Dissenting::deinit()
        ::defiance              refDefiance - 1 = 1
    let dispute
    let quibble
    var defiance
        ::deinit()              refDefiance - 1 = 0,   call Defiance::deinit()
        ::dissenting            weakRefDissenting - 1 = 0
    var dissenting              an empty pointer

PRINT:
    Dissenting::deinit()
    Quibble
    Quibble
    Defiance::deinit()
 */







class Dissenting {
    weak var defiance: Defiance?             // weak reference
    deinit {
        print("Dissenting::deinit()")
    }
}

class Defiance {
    weak var dissenting: Dissenting?
    deinit {
        print("Defiance::deinit()")
    }
}

var scale:Dissenting? = Dissenting()    // refDissenting = 1
var bias:Defiance? = Defiance()         // refDefiance = 1
scale!.defiance = bias                  // refDefiance + 1 = 2
bias!.dissenting = scale                // refDissenting + 1 = 2
scale = nil                             // weak reference, scale.deinit() called
print("-- Squeeze --")
bias = nil
print("-- No Memory Leak --")
/*
 Dissenting::deinit()
 -- Squeeze --
 Defiance::deinit()
 -- No Memory Leak --
 */




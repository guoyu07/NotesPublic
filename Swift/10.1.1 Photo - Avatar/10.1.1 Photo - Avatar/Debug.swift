
//#if swift(>= 2.2) {
    func tracingMethods(file: String, _ function: String, _ line: Int) {
        if (Debug.traceingMethods) {
            print("\(file) \(function):\(line)")
        }
    }
//}

struct Debug {
    static var traceingMethods = false

    struct Avatar {
        static var recognizeGestures = false
        static var debugIsOutOfBounds = false
        static var panningVelocity = false
        static var savingPosition = false
    }
}


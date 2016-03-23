extension Conf {
    struct URL {
        private struct host {
            static let a = "http://192.168.1.103/"
        }
        
        
        static let test = host.a + "swift/"
        static let uploadFile = host.a + "swift/uploadFile.php"
        
    }
}
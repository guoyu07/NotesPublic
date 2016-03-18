import UIKit
class ErrorHandle : UIViewController {
    let alertController = UIAlertController(title:nil, message: "Error", preferredStyle: .Alert)
    func alert(msg: String) {
        alertController.message = msg
        self.presentViewController(alertController, animated: true, completion: nil)
    }

}
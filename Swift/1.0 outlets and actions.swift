import UIKit

/**
 * You can use two different attributes `@IBDesignable` and `IBInspectable` to
 *  enable live, interactive custom view design in Interface Builder.
 * When you create a custom view that inherits from the UIView or the NSView,
 *  you can add the @IBDesignable.
 */
@IBDesignable
class ViewController: UIView {
    @IBInspectable var textColor: UIColor
    @IBInspectable var iconHeight: CGFloat
    @IBOutlet weak var button: UIButton!
    @IBOutlet var textFields: [UITextField]!
    @IBAction func buttonTapped(_: AnyObject) {
        
    }
}
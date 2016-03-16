/**
 * @see https://developer.apple.com/library/ios/documentation/UIKit/Reference/UIKit_Framework/index.html
 *
 */
import UIKit

import UIKit

class AppDelegate: UIResponder, UIApplicationDelegate {
    var window: UIWindow?
    func application(application: UIApplication, didFinishLaunchingWithOptions launchOptions: [NSObject: AnyObject]?) -> Bool {
        
        // change tintColor to orange
        self.window?.tintColor = UIColor.orangeColor()
        
        return true
    }
}


/**
 * You can use two different attributes `@IBDesignable` and `IBInspectable` 
 *  to enable live, interactive custom view design in Interface Builder.
 * When you create a custom view that inherits from the UIView or the 
 *  NSView, you can add the @IBDesignable.
 */
@IBDesignable
class ExtView: UIView {
    @IBInspectable var textColor: UIColor
    @IBInspectable var iconHeight: CGFloat
    @IBOutlet weak var button: UIButton!
    @IBOutlet var textFields: [UITextField]!
    @IBAction func buttonTapped(_: AnyObject) {
        
    }
}

/**
 * actions
 *  .TouchDown                  mouse down
 *  .TouchUpInside              mouse up
 */


/**
 * UILable
 *  CGPointMake(x: Float, y: Float)
 *  CGSizeMake(width: Float, height: Float)
 */

let label = UILable(frame:CGRect(origin: CGPointMake(10.0, 50.0), size: CGSizeMake(150, 50)))
label.text = "Instantaneous"
self.view.addSubview(label)


/**
 * UIButton
 */
@IBAction func btnClick(sender: UIButton!) {
    sender.setTitle("Signed", forState: UIControlState.Normal)
}

let btn = UIButton(frame:CGRect(origin: CGPointMake(10.0, 110.0), size: CGSizeMake(300, 30)))
btn.setTitle("Sign Up", forState: UIControlState.Normal)
btn.backgroundColor = UIColor.redColor()
btn.addTarget(self, action: "btnClick:", forControlEvents: UIControlEvents.TouchUpInside)
self.view.addSubview(btn)


/**
 * UIAlertController
 * @see https://developer.apple.com/library/tvos/documentation/UIKit/Reference/UIAlertController_class/index.html#//apple_ref/c/econst/UIAlertControllerStyleAlert
 */
@IBAction func showAlert() {
    
    /**
     *  enum UIAlertControllerStyle: Int {
     *      case ActionSheet            // bottom
     *      case Alert                  // middle
     *  }
     */
    let alertController = UIAlertController(title: "Hey AppCoda", message: "What do you want to do?", preferredStyle: .ActionSheet)
    
    /**
    * func addTextFieldWithConfigurationHandler(_ configurationHandler: ((UITextField) -> Void)?)
     */
    alertController.addTextFieldWithConfigurationHandler {
        (textfiled:UITextField) -> Void in
        
    }
    
    
    let cancelAction: UIAlertAction = UIAlertAction(title: "Cancel", style: .Cancel, handler: { (action:UIAlertAction!) -> Void in
    })
    
    alertController.addAction(cancelAction)
    
    let callActionHandler = { (action:UIAlertAction!) -> Void in
        let alertMessage = UIAlertController(title: "Service Unavailable", message: "Sorry, the call feature is not available yet. Please retry later.", preferredStyle: .Alert)
        
        alertMessage.addTextFieldWithConfigurationHandler {
            (textfield:UITextField) -> Void in
            textfield.text = "Only support UIAlertControllerStyle.Alert!!!"
            textfield.textColor = UIColor.magentaColor()
        }
        
        alertMessage.addAction(UIAlertAction(title: "OK", style: .Default, handler: nil))
        self.presentViewController(alertMessage, animated: true, completion: nil)
    }

    let defaultAction = UIAlertAction(title: "Testing Service...", style: .Default, handler: callActionHandler)
    
    alertController.addAction(defaultAction)
    
    
    let cameraAction = UIAlertAction(title:"Take Photo", style: .Default, handler: {
        action in
        
    })
    
    alertController.addAction(cameraAction)
    presentViewController(alertController, animated: true, completion: nil)
}



/**
 * UIImageView: UIView          Assets.xcassets/img.png
 *  .frame: CGRect
 */
let img = UIImageView(image: UIImage(named: "img.png"))
print(img.frame.size)   // (100, 100)
img.frame = CGRect(x:100.0, y:100.0, width:180, height: 180)
print(img.frame.size)   // (180, 180)s
view.addSubview(img)


// Resources/img.png
let imgPath = NSBundle.mainBundle().bundleURL.URLByAppendingPathComponent("img.png")
let  imgData = NSData(contentsOfURL imgPath)
let img = UIImageView(data: imageData)
view.addSubview(img)


/**
 * UIImagePickerController: UIImagePickerControllerDelegate, UINavigationControllerDelegate
 */
class ViewController: UIViewController, UIImagePickerControllerDelegate, UINavigationControllerDelegate {
    let imagePicker: UIImagePickerController! = UIImagePickerController()
    @IBAction func loadImage(sender: UIAlertAction){
        imagePicker.allowsEditing = false
        /**
         *  enum UIImagePickerControllerSourceType : Int {
         *      case PhotoLibrary
         *      case Camera
         *      case SavedPhotosAlbum
         *  }
         */
        imagePicker.sourceType = .Camera
        imagePicker.cameraCaptureMode = .Photo
    }
    /**
     * ImagePickerController::didFinishPickingMediaWithInfo
     * UIImagePickerControllerDelegate::imagePickerController
     * UIImagePickerControllerDelegate::imagePickerControllerCancel
     */
    override func viewDidLoad() {
        super.viewDidLoad()
        imagePicker.delegate = self
    }
}

/**
 * Video
 */





//
//  ViewController.swift
//  app
//
//  Created by Aario on 3/5/16.
//  Copyright © 2016 Aario. All rights reserved.
//

import UIKit

class ViewController: UIViewController {
    
    @IBOutlet weak var usernameTextField: UITextField!
    
    @IBOutlet weak var passwordTextField: UITextField!
    
    @IBAction func signSwitch(sender: UISwitch) {
    }

    @IBOutlet weak var signButtonOutlet: UIButton!
    @IBAction func signButton(sender: UIButton) {
        usernameTextField.text = "Aario"
    }
    
    @IBAction func buttonClick(sender: UIButton!) {
        showAlert()
        sender.setTitle("Signed", forState: UIControlState.Normal)
    }
    
    @IBAction func showAlert() {
        let alertController:UIAlertController = UIAlertController(title: "Aario's Tutorial", message: "请选择您需要的功能", preferredStyle: .ActionSheet)
        
       

        
        let cancelAction: UIAlertAction = UIAlertAction(title: "取消", style: .Cancel, handler: { (action:UIAlertAction!) -> Void in
        })
        
        alertController.addAction(cancelAction)
        
        
        
        let callActionHandler = { (action:UIAlertAction!) -> Void in
            let alertMessage = UIAlertController(title: "哈哈 😄", message: "点了什么都看不到的，因为还没做好…… 有什么想法就在下面留言吧！", preferredStyle: .Alert)
            alertMessage.addTextFieldWithConfigurationHandler {
                (textfield:UITextField) -> Void in
                textfield.text = "只适合UIAlertControllerStyle.Alert的UITextField"
                textfield.textColor = UIColor.magentaColor()
            }
            alertMessage.addAction(UIAlertAction(title: "我知道了……", style: .Default, handler: nil))
            
            self.presentViewController(alertMessage, animated: true, completion: nil)
        }
        
        let defaultAction = UIAlertAction(title: "点我吧 Y(^_^)Y", style: .Default, handler: callActionHandler)
        
        alertController.addAction(defaultAction)
        
        
        let cameraAction = UIAlertAction(title:"拍照", style: .Default, handler: {
            action in
            
        })
        
        alertController.addAction(cameraAction)
        
        
        
        presentViewController(alertController, animated: true, completion: nil)

    }
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        
        let label = UILabel(frame:CGRect(origin: CGPointMake(100.0, 50.0), size: CGSizeMake(150,50)))
        label.text = "This is a Label"
        self.view.addSubview(label)
        
        let btn = UIButton(frame:CGRect(origin: CGPointMake(10.0, 110.0), size: CGSizeMake(300, 30)))
        btn.setTitle("button", forState: UIControlState.Normal)
        btn.backgroundColor = UIColor.redColor()
        btn.addTarget(self, action: "buttonClick:", forControlEvents: UIControlEvents.TouchUpInside)
        self.view.addSubview(btn)


        
        
        signButtonOutlet.layer.cornerRadius = 5.0
        signButtonOutlet.layer.masksToBounds = true
    
        UIView.animateWithDuration(0.8, animations: { () -> Void in
            let upValue:CGFloat=200.0
            var accountFrame:CGRect=self.usernameTextField.frame
            accountFrame.origin.y=accountFrame.origin.y-upValue
            self.usernameTextField.frame=accountFrame
            var passwordFrame:CGRect=self.passwordTextField.frame
            passwordFrame.origin.y=passwordFrame.origin.y-upValue
            self.passwordTextField.frame=passwordFrame
            var btnLoginFrame:CGRect=self.signButtonOutlet.frame
            btnLoginFrame.origin.y=btnLoginFrame.origin.y-upValue
            self.signButtonOutlet.frame=btnLoginFrame
        })

    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }


}


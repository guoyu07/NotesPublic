//
//  ViewController.swift
//  9.1.0 Taking photo with camera
//
//  Created by Aario on 3/5/16.
//  Copyright © 2016 Aario. All rights reserved.
//

import UIKit

class ViewController: UIViewController, UIImagePickerControllerDelegate, UINavigationControllerDelegate  {
    
    @IBOutlet weak var currentImage: UIImageView!
    let imagePicker: UIImagePickerController! = UIImagePickerController()
    
    @IBAction func takePhoto(sender: UIAlertAction) {
        if (UIImagePickerController.isSourceTypeAvailable(.Camera)) {
            if UIImagePickerController.availableCaptureModesForCameraDevice(.Rear) != nil {
                imagePicker.allowsEditing = false
                imagePicker.sourceType = .Camera
                imagePicker.cameraCaptureMode = .Photo
                presentViewController(imagePicker, animated: true, completion: {})
            } else {
                print("Application cannot access the camera.")
            }
        } else {
            print("Camera inaccessable Application cannot access the camera.")
        }
    }
    func imagePickerController(picker: UIImagePickerController, didFinishPickingMediaWithInfo info: [String : AnyObject]) {
        print("Got an image")
        if let pickedImage:UIImage = (info[UIImagePickerControllerOriginalImage]) as? UIImage {
            let selectorToCall = Selector("imageWasSavedSuccessfully:didFinishSavingWithError:context:")
            UIImageWriteToSavedPhotosAlbum(pickedImage, self, selectorToCall, nil)
        }
        imagePicker.dismissViewControllerAnimated(true, completion: {
            // Anything you want to happen when the user saves an image
        })
    }
    
    func imagePickerControllerDidCancel(picker: UIImagePickerController) {
        print("User canceled image")
        dismissViewControllerAnimated(true, completion: {
            // Anything you want to happen when the user selects cancel
        })
    }
    
    @IBAction func takePhotoBtn(sender: UIButton) {

        let takePhotoAlert = UIAlertController(title: "Aario Ai", message: "To be, and to be myself!", preferredStyle: .ActionSheet)
        let cancelAction: UIAlertAction = UIAlertAction(title: "Cancel", style: .Cancel, handler: {
            action in
        })
        takePhotoAlert.addAction(cancelAction)
        
        let takePhotoAction = UIAlertAction(title: "Taking Photo", style: .Default, handler: {
            action in
            self.takePhoto(action)
        })
        takePhotoAlert.addAction(takePhotoAction)
        
        let takeImageAction = UIAlertAction(title: "Take From album", style: .Default, handler: {
            action in
            
        })
        takePhotoAlert.addAction(takeImageAction)
        
        
        presentViewController(takePhotoAlert, animated: true, completion: nil)

    }
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        let btn = UIButton(frame:CGRect(origin: CGPointMake(10.0, 110.0), size: CGSizeMake(300, 30)))
        btn.setTitle("Take Photo", forState: UIControlState.Normal)
        btn.backgroundColor = UIColor.grayColor()
        btn.addTarget(self, action: "takePhotoBtn:", forControlEvents: UIControlEvents.TouchUpInside)
        self.view.addSubview(btn)
        
        let imgView = UIImageView(image: UIImage(named: "default.jpeg"))
        imgView.frame = CGRect(x:10.0, y: 200.0, width:300, height: 300)
        self.view.addSubview(imgView)

    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }


}


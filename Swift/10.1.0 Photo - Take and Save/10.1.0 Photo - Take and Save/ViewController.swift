//
//  ViewController.swift
//  10.1.0 Photo - Take and Save
//
//  Created by Aario on 3/9/16.
//  Copyright © 2016 Aario. All rights reserved.
//


import UIKit

class ViewController: UIViewController, UIImagePickerControllerDelegate, UINavigationControllerDelegate  {
    
    var imagePickerSourceType:UIImagePickerControllerSourceType! = .Camera
    var saveImagePickerFiles: Bool = false
    
    @IBOutlet var imageView: UIImageView!
    @IBOutlet var imagePicker: UIImagePickerController! = UIImagePickerController()
    
    @IBAction func takePhoto(sender: UIAlertAction) {
        if (UIImagePickerController.isSourceTypeAvailable(.Camera)) {
            if UIImagePickerController.availableCaptureModesForCameraDevice(.Rear) != nil {
                imagePicker.allowsEditing = true
                imagePicker.sourceType = self.imagePickerSourceType
                if(self.imagePickerSourceType == .Camera) {
                    imagePicker.cameraCaptureMode = .Photo
                }
                presentViewController(imagePicker, animated: true, completion: {})
            } else {
                print("Cannot access the camera.")
            }
        } else {
            print("Camera inaccessable.")
        }
    }
    func imagePickerController(picker: UIImagePickerController, didFinishPickingMediaWithInfo info: [String : AnyObject]) {
        print("Got an image!")
        if let pickedImage:UIImage = (info[UIImagePickerControllerOriginalImage]) as? UIImage {
            imageView.image = pickedImage
            
            if (self.saveImagePickerFiles && self.imagePickerSourceType == .Camera) {
                UIImageWriteToSavedPhotosAlbum(pickedImage, nil, nil, nil)
                print("Saved by .Camera")
            }
        }
        imagePicker.dismissViewControllerAnimated(true, completion: {
            // Anything you want to happen when the user saves an image
        })
    }
    
    func imagePickerControllerDidCancel(picker: UIImagePickerController) {
        dismissViewControllerAnimated(true, completion: {
            // Anything you want to happen when the user selects cancel
            print("User canceled image")
        })
    }
    
    @IBAction func takePhotoBtn(sender: UIButton) {
        sender.backgroundColor = Conf.Theme.btnDefault.hoverColor
        
        let takePhotoAlert = UIAlertController(title: "Aario Ai", message: "To be, and to be myself!", preferredStyle: .ActionSheet)
        let cancelAction: UIAlertAction = UIAlertAction(title: "Cancel", style: .Cancel, handler: {
            action in
            sender.backgroundColor = Conf.Theme.btnDefault.defaultColor
        })
        takePhotoAlert.addAction(cancelAction)
        
        let takePhotoAction = UIAlertAction(title: "Take Photo", style: .Default, handler: {
            action in
            self.imagePickerSourceType = .Camera
            self.takePhoto(action)
            sender.backgroundColor = Conf.Theme.btnDefault.defaultColor

        })
        takePhotoAlert.addAction(takePhotoAction)
        
        let takeImageAction = UIAlertAction(title: "Choose from Photos", style: .Default, handler: {
            action in
            self.imagePickerSourceType = .SavedPhotosAlbum
            self.takePhoto(action)
            sender.backgroundColor = Conf.Theme.btnDefault.defaultColor

        })
        takePhotoAlert.addAction(takeImageAction)
        
        
        presentViewController(takePhotoAlert, animated: true, completion: nil)
        
    }
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        imagePicker.delegate = self
        saveImagePickerFiles = true
        
        let btn = UIButton(frame:CGRect(origin: CGPointMake(10.0, 110.0), size: CGSizeMake(300, 30)))
        btn.setTitle("Take Photo", forState: UIControlState.Normal)
        btn.backgroundColor = Conf.Theme.btnDefault.defaultColor
        
        btn.addTarget(self, action: "takePhotoBtn:", forControlEvents: UIControlEvents.TouchDown)
        self.view.addSubview(btn)
        
        imageView = UIImageView(image: UIImage(named: "default.jpeg"))
        imageView.frame = CGRect(x:10.0, y: 200.0, width:300, height: 300)
        imageView.contentMode = .ScaleAspectFit
        self.view.addSubview(imageView)
        
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    
}



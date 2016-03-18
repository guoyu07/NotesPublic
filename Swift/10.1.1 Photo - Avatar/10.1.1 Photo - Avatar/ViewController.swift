

import UIKit
import Gifu

class ViewController: UIViewController, UIImagePickerControllerDelegate, UINavigationControllerDelegate  {
    var panAvatarLastTranslation: CGPoint = CGPoint(x: 0.0, y: 0.0)
    @IBOutlet weak var img: UIImageView!
    @IBOutlet weak var avatar: UIImageView!
    @IBOutlet weak var savingLoading: AnimatableImageView!
    //@IBOutlet weak var saveBtn: UIButton!
    
    var enableRotation: Bool = false
    
    let imagePicker: UIImagePickerController! = UIImagePickerController()

    
    
    func handleAvatarOutOfBounds() {
        
        let standardAvatarBound: [String:CGFloat] = [
            "top": UIApplication.sharedApplication().statusBarFrame.height + UIScreen.mainScreen().bounds.width / 2 - Conf.Size.avatarSize.height / 2,
            "right": UIScreen.mainScreen().bounds.width / 2 + Conf.Size.avatarSize.width / 2,
            "bottom": UIApplication.sharedApplication().statusBarFrame.height + UIScreen.mainScreen().bounds.width / 2 + Conf.Size.avatarSize.height / 2,
            "left": UIScreen.mainScreen().bounds.width / 2 - Conf.Size.avatarSize.width / 2
        ]
        let avatarBound: [String:CGFloat] = [
            "top": self.avatar.center.y - self.avatar.frame.height / 2,
            "right": self.avatar.frame.width / 2 + self.avatar.center.x,
            "bottom": self.avatar.center.y + self.avatar.frame.height / 2,
            "left": self.avatar.center.x - self.avatar.frame.width / 2
        ]
        
        if (self.panAvatarLastTranslation.x < 0 && avatarBound["right"] < standardAvatarBound["right"]) {
            UIView.animateWithDuration(0.5, animations: {
                self.avatar.center.x += (standardAvatarBound["right"]! - avatarBound["right"]!)
            })
            if (Debug.Avatar.debugIsOutOfBounds) {
                print("Out of right bound")
            }
        }
        
        if(self.panAvatarLastTranslation.x > 0 && avatarBound["left"] > standardAvatarBound["left"]) {
            UIView.animateWithDuration(0.5, animations: {
                self.avatar.center.x -= (avatarBound["left"]! - standardAvatarBound["left"]!)
            })
            if (Debug.Avatar.debugIsOutOfBounds) {
                print("Out of left bound")
            }
        }
        
        if(self.panAvatarLastTranslation.y > 0 && avatarBound["top"] > standardAvatarBound["top"]) {
            UIView.animateWithDuration(0.5, animations: {
                self.avatar.center.y -= (avatarBound["top"]! - standardAvatarBound["top"]!)
            })
            if (Debug.Avatar.debugIsOutOfBounds) {
                print("Out of top bound")
            }
        }
        if(self.panAvatarLastTranslation.y < 0 && avatarBound["bottom"] < standardAvatarBound["bottom"]) {
            UIView.animateWithDuration(0.5, animations: {
                self.avatar.center.y += (standardAvatarBound["bottom"]! - avatarBound["bottom"]!)
            })
            if (Debug.Avatar.debugIsOutOfBounds) {
                print("Out of bottom bound")
            }
        }
    }
    
    
    @IBAction func back(sender: UIButton) {
        
    }
    
    @IBAction func changeAvatarTouchDown(sender: UIButton) {
        sender.setTitleColor(Theme.Avatar.focusedColor, forState: .Normal)
    }
    
    @IBAction func changeAvatar(sender: UIButton) {
        sender.setTitleColor(Theme.Avatar.tintColor, forState: .Normal)
        let changeAvatarAlert = UIAlertController(title:nil, message: nil, preferredStyle: .ActionSheet)
        changeAvatarAlert.addAction(UIAlertAction(title: "Calcel", style: .Cancel, handler: {
            action in
        }))
        
        changeAvatarAlert.addAction(UIAlertAction(title: "Take Profile Photo", style: .Default, handler: {
            action in
            if (UIImagePickerController.isSourceTypeAvailable(.Camera)) {
                if UIImagePickerController.availableCaptureModesForCameraDevice(.Rear) != nil {
                    self.imagePicker.allowsEditing = true
                    self.imagePicker.sourceType = .Camera
                    self.imagePicker.cameraCaptureMode = .Photo
                    self.presentViewController(self.imagePicker, animated: true, completion: nil)
                } else {
                    Aa.errorHandle.alert("Cannot access the camera.")
                }
            } else {
                Aa.errorHandle.alert("Camera inaccessable.")
            }

        }))
        
        changeAvatarAlert.addAction(UIAlertAction(title: "Choose from Library", style: .Default, handler: {
            action in
            self.imagePicker.allowsEditing = true
            self.imagePicker.sourceType = .PhotoLibrary
            self.presentViewController(self.imagePicker, animated: true, completion: nil)
        }))

        presentViewController(changeAvatarAlert,animated: true, completion: nil)
    }
    func imagePickerController(picker: UIImagePickerController, didFinishPickingMediaWithInfo info : [String : AnyObject]) {
        if let pickedImage : UIImage = (info[UIImagePickerControllerOriginalImage]) as? UIImage {
            initAvatar(pickedImage)
            if (self.imagePicker.sourceType == .Camera) {
                UIImageWriteToSavedPhotosAlbum(pickedImage, nil, nil, nil)
            }
        }
        imagePicker.dismissViewControllerAnimated(true, completion: {
            // Anything you want to happen when the user saves an image
        })

    }
    
    @IBAction func saveAvatar(sender: UIButton) {
        
        let avatarMaskCenter:CGPoint = CGPoint(x: UIScreen.mainScreen().bounds.width / 2, y: UIApplication.sharedApplication().statusBarFrame.height + UIScreen.mainScreen().bounds.width / 2)
        let cropingCenter = CGPoint(x: avatarMaskCenter.x - avatar.frame.origin.x, y: avatarMaskCenter.y - self.avatar.frame.origin.y)
        let cropingOrigin = CGPoint(x: cropingCenter.x - Conf.Size.avatarSize.width / 2, y: cropingCenter.y - Conf.Size.avatarSize.height / 2)
        
        if let img = avatar.image {
            let imgWidthScale: CGFloat =  img.size.width / avatar.frame.width
            let imgHeightScale: CGFloat =  img.size.height / avatar.frame.height
            let rect: CGRect = CGRectMake(ceil(cropingOrigin.x * imgWidthScale), ceil(cropingOrigin.y * imgHeightScale), Conf.Size.avatarSize.width * imgWidthScale, Conf.Size.avatarSize.height * imgHeightScale)
            
            let imgRef: CGImageRef = CGImageCreateWithImageInRect(img.CGImage, rect)!
            let croppedImg = UIImage(CGImage: imgRef, scale: 1, orientation: .Up)
            UIImageWriteToSavedPhotosAlbum(croppedImg, nil, nil, nil)
            
            if (Debug.Avatar.savingPosition) {
                print(rect.origin)
                print("Size: img=\(img.size) CGImage=(\(CGImageGetWidth(img.CGImage)), \(CGImageGetHeight(img.CGImage))) frame=\(avatar.frame.size)")
                print("Size: rect=\(rect.size) imgRef=(\(CGImageGetWidth(imgRef)), \(CGImageGetHeight(imgRef))) cropped=\(croppedImg.size)")
                print("screenCenter=(\(UIScreen.mainScreen().bounds.width / 2), \(UIApplication.sharedApplication().statusBarFrame.height + UIScreen.mainScreen().bounds.width / 2)) center=\(self.avatar.center)")
            }
        }
        
        
        handleSaved(sender)
    }
    
    func handleSaved(sender: UIButton) {
        let alert = UIAlertController(title: "", message: "Saved", preferredStyle: .Alert)
        let action = UIAlertAction(title: "OK", style: .Default, handler: {
            action in
            self.savingLoading?.hidden = true
            self.savingLoading?.stopAnimatingGIF()
            sender.hidden = false
            
        })
        
        alert.addAction(action)
        presentViewController(alert, animated: true, completion: nil)
        
        
    }
    @IBAction func showSavingLoading(sender: UIButton) {
        if (savingLoading == nil) {
            let savingLoadingTmp = AnimatableImageView()
            savingLoadingTmp.animateWithImage(named: "loading2.gif")
            savingLoadingTmp.frame = CGRect(x: UIScreen.mainScreen().bounds.width - 60, y: UIApplication.sharedApplication().statusBarFrame.height, width:30, height:30)
            savingLoading = savingLoadingTmp
            view.addSubview(savingLoading)
            view.bringSubviewToFront(savingLoading)
        } else {
            savingLoading.startAnimatingGIF()
            savingLoading.hidden = false
        }
        
        sender.hidden = true
    }
    
    @IBAction func resizeByDoubleTap(recognizer: UITapGestureRecognizer) {
        recognizer.numberOfTapsRequired = 2
        
        let scale: CGFloat = 1.2
        
        UIView.animateWithDuration(0.5, animations: {
            self.avatar.transform = CGAffineTransformScale(self.avatar.transform, scale, scale)
            })

        
        
    }
    @IBAction func resizeAvatar(recognizer: UIPinchGestureRecognizer) {
        if (Debug.Avatar.recognizeGestures) {
            print("resize")
        }
        var scale: CGFloat = recognizer.scale
        
        avatar.transform = CGAffineTransformScale(avatar.transform, scale, scale)
        
        if (scale < 1 && (avatar.frame.width < Conf.Size.avatarSize.width || avatar.frame.height < Conf.Size.avatarSize.height)) {
            scale = 2.01 - scale     // zoom out,  ceil(20 - scale * 10) / 10
            avatar.transform = CGAffineTransformScale(avatar.transform, scale, scale)
        }
        recognizer.scale = 1.0
        handleAvatarOutOfBounds()
    }

    
    /**
     * Rotate may leave something wrong to Pan
     */
    @IBAction func rotateAvatar(recognizer: UIRotationGestureRecognizer) {
        if (Debug.Avatar.recognizeGestures) {
            print("rotate")
        }
        let rotation =  recognizer.velocity * 0.05
        avatar.transform = CGAffineTransformRotate(avatar.transform, rotation)
    }
    @IBAction func moveAvatar(recognizer:UIPanGestureRecognizer) {
        recognizer.maximumNumberOfTouches = 1
        recognizer.minimumNumberOfTouches = 1
        if (Debug.Avatar.recognizeGestures) {
            print("pan")
        }
        let translation = recognizer.translationInView(self.avatar)
        
        if (self.avatar.frame.width <  Conf.Size.avatarSize.width) {
            self.avatar.frame = CGRect(origin: self.avatar.frame.origin, size: CGSize(width: Conf.Size.avatarSize.width, height:Conf.Size.avatarSize.height))
        }
        if let view = recognizer.view {
            switch recognizer.state {
            //case .Began:
                
            case .Changed:
                if (Debug.Avatar.panningVelocity) {
                    print("Changed: velocity: \(recognizer.velocityInView(view))  translation: \(translation)")
                }
                panAvatarLastTranslation = translation
                self.avatar.center = CGPoint(x: self.avatar.center.x + translation.x, y: self.avatar.center.y + translation.y)
            case .Ended:
                var velocityDistance = sqrt(pow(recognizer.velocityInView(view).x, CGFloat(2)) + pow(recognizer.velocityInView(view).y, CGFloat(2)))
                
                if (Debug.Avatar.panningVelocity) {
                    print("Ended: velocity: \(recognizer.velocityInView(view))  translation: \(translation)")
                    print("velocityDistance: \(velocityDistance)")
                }
                
                if (velocityDistance > 50) {
                    let inertiaDelay: NSTimeInterval = 0.5
                    if (velocityDistance > 1500) {
                        velocityDistance = 1500
                    }
                    // 60HZ = 60 / sec
                    let inertiaDistance : CGFloat = velocityDistance * CGFloat(inertiaDelay) * (1/60)
                    let inertiaX:CGFloat = self.panAvatarLastTranslation.x * inertiaDistance
                    let inertiaY:CGFloat = self.panAvatarLastTranslation.y * inertiaDistance
                                        //sqrt(pow(inertiaX, CGFloat(2)) + pow(inertiaY, CGFloat(2)))
                    //print("inertiaDelay: \(inertiaDelay)")
                    UIView.animateWithDuration(inertiaDelay, delay: 0, usingSpringWithDamping: 0.8, initialSpringVelocity: 6, options: UIViewAnimationOptions.AllowUserInteraction, animations: {
                        self.avatar.center.x += inertiaX
                        self.avatar.center.y += inertiaY
                    }, completion: nil)
                }
            default:
                print("default")
            }
            self.handleAvatarOutOfBounds()
        }
        recognizer.setTranslation(CGPointZero, inView: view)
    }
    
    func maskAvatar(){
        let maskerView = UIView(frame: CGRect(x:0, y:UIApplication.sharedApplication().statusBarFrame.height, width: UIScreen.mainScreen().bounds.width, height: UIScreen.mainScreen().bounds.width))

        let range: CGFloat = UIScreen.mainScreen().bounds.width
        let radius: CGFloat = Conf.Size.avatarSize.width / 2
        
        // Create a path with the rectangle in it.
        let path = CGPathCreateMutable()
        let rect = CGRectMake(0, 0, range, range)
        CGPathMoveToPoint(path, nil, CGRectGetMinX(rect), CGRectGetMinY(rect))
        CGPathAddLineToPoint(path, nil, CGRectGetMaxX(rect), CGRectGetMinY(rect))
        CGPathAddLineToPoint(path, nil, CGRectGetMaxX(rect), CGRectGetMaxY(rect))
        CGPathAddLineToPoint(path, nil, CGRectGetMinX(rect), CGRectGetMaxY(rect))
        CGPathCloseSubpath(path)
        
        
        CGPathMoveToPoint(path, nil, range / 2 + radius, range / 2 + radius)
        CGPathAddArc(path, nil, range / 2, range / 2, radius, 0, CGFloat(M_PI * 2), false)
        

        
        let maskLayer = CAShapeLayer()
        maskLayer.path = path
        maskLayer.fillColor = UIColor.blackColor().CGColor
        maskerView.backgroundColor = UIColor.blackColor()
        maskLayer.fillRule = kCAFillRuleEvenOdd
        
        maskerView.alpha = 0.5
        self.view.addSubview(maskerView)
        maskerView.layer.mask = maskLayer
        
        
        // circle
        let circlePath = UIBezierPath(arcCenter: CGPoint(x: range / 2,y: range / 2), radius: radius, startAngle: CGFloat(0), endAngle:CGFloat(M_PI * 2), clockwise: true)
        
        let shapeLayer = CAShapeLayer()
        shapeLayer.path = circlePath.CGPath
        
        //change the fill color
        shapeLayer.fillColor = UIColor.clearColor().CGColor
        //you can change the stroke color
        shapeLayer.strokeColor = UIColor.whiteColor().CGColor
        //you can change the line width
        shapeLayer.lineWidth = 3.0

        
        
        maskerView.layer.addSublayer(shapeLayer)
        
        maskerView.addGestureRecognizer(UIPanGestureRecognizer(target: self, action: "moveAvatar:"))
        maskerView.addGestureRecognizer(UIPinchGestureRecognizer(target: self, action: "resizeAvatar:"))
        maskerView.addGestureRecognizer(UITapGestureRecognizer(target: self, action: "resizeByDoubleTap:"))
        if (enableRotation) {
            maskerView.addGestureRecognizer(UIRotationGestureRecognizer(target: self, action: "rotateAvatar:"))
        }
        maskerView.addGestureRecognizer(UISwipeGestureRecognizer(target: self, action: "swipeAvatar:"))
    }

    
    func initAvatar(image: UIImage) {
        //print("centerBefore: \(avatar.center)")
        avatar.image = image
        initAvatarPosition(avatar)
        //print("centerAfter: \(avatar.center)")
    }
    func initAvatarPosition(avatar: UIImageView) {
        if let img = avatar.image {
            var avatarX:CGFloat = 0
            var avatarY: CGFloat = UIApplication.sharedApplication().statusBarFrame.height
            var avatarWidth:CGFloat = img.size.width
            var avatarHeight:CGFloat = img.size.height
            
            let avatarImgProportion = img.size.width / img.size.height
            
            if (img.size.width > UIScreen.mainScreen().bounds.width * 2) {
                avatarWidth = UIScreen.mainScreen().bounds.width
                avatarHeight = avatarWidth / avatarImgProportion
            }
            
            if (img.size.width == img.size.height) {
                if (img.size.width < Conf.Size.avatarSize.width) {
                    avatarWidth = Conf.Size.avatarSize.width
                    avatarHeight = Conf.Size.avatarSize.height
                }
            } else if (img.size.width > img.size.height) {
                if (img.size.height < Conf.Size.avatarSize.height) {
                    avatarHeight = Conf.Size.avatarSize.height
                    avatarWidth = avatarImgProportion * avatarHeight
                }
            } else {
                if (img.size.width < Conf.Size.avatarSize.height) {
                    avatarWidth = Conf.Size.avatarSize.width
                    avatarHeight = avatarWidth / avatarImgProportion
                }
                
            }
            
            if (avatarWidth < UIScreen.mainScreen().bounds.width) {
                avatarX += (UIScreen.mainScreen().bounds.width - avatarWidth) / 2
            }
            if (avatarHeight < UIScreen.mainScreen().bounds.width) {
                avatarY += (UIScreen.mainScreen().bounds.width - avatarHeight) / 2
            }
            avatar.frame = CGRect(x: avatarX, y: avatarY, width: avatarWidth, height: avatarHeight)
            if (Debug.Avatar.savingPosition) {
                print("origin=\(img.size) scale=\(img.scale) CGImage=(\(CGImageGetWidth(img.CGImage)), \(CGImageGetHeight(img.CGImage))) now=\(avatarWidth) \(avatarHeight)")
            }
        }
    }
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        imagePicker.delegate = self
        
        let statusBarBg = UIImageView(frame: CGRect(x:0, y:0, width: UIApplication.sharedApplication().statusBarFrame.size.width, height: UIApplication.sharedApplication().statusBarFrame.size.height))
        statusBarBg.backgroundColor = UIColor.blackColor()
        self.view.addSubview(statusBarBg)
        
        
        let backBtn = UIButton(frame: CGRect(origin: CGPointMake(10.0, 20.0), size: CGSizeMake(80, 30)))
        backBtn.setTitle("< Back", forState: UIControlState.Normal)
        backBtn.contentHorizontalAlignment = .Left
        backBtn.contentVerticalAlignment = .Center
        backBtn.addTarget(self, action: "back: ", forControlEvents: UIControlEvents.TouchUpInside)
        self.view.addSubview(backBtn)
        
        let saveBtn = UIButton(frame: CGRect(x: UIScreen.mainScreen().bounds.width - 60, y: UIApplication.sharedApplication().statusBarFrame.height, width: 60, height: 30))
        saveBtn.setTitle("Save", forState: UIControlState.Normal)
        saveBtn.addTarget(self, action: "showSavingLoading:", forControlEvents: UIControlEvents.TouchDown)
        saveBtn.addTarget(self, action: "saveAvatar:", forControlEvents: UIControlEvents.TouchUpInside)
        self.view.addSubview(saveBtn)
        
       
        

        
        
        let avatarView = UIImageView(image: UIImage(named: "long"))
        avatarView.contentMode = .ScaleToFill
        avatarView.userInteractionEnabled = true
        //avatarView.alpha = 0.5
        avatarView.backgroundColor = UIColor.blackColor()
        avatarView.clipsToBounds = true
        maskAvatar()

        avatar = avatarView
        initAvatarPosition(avatar)
        self.view.addSubview(avatar)
        
        
        
        let margin: CGFloat = 20.0
        let btnWidth: CGFloat = 90.0
        let btnHeight: CGFloat = 26.0
        let changeAvatarBtnX = UIScreen.mainScreen().bounds.width / 2 - btnWidth - margin
        let changeAvatarBtnY = UIScreen.mainScreen().bounds.width + UIApplication.sharedApplication().statusBarFrame.height - btnHeight * 2.5
        let changeAvatarBtn = UIButton(frame: CGRect(x: changeAvatarBtnX, y: changeAvatarBtnY, width: btnWidth, height: btnHeight))
        changeAvatarBtn.setTitle("Change", forState: UIControlState.Normal)
        changeAvatarBtn.opaque = true
        changeAvatarBtn.layer.cornerRadius = 13
        changeAvatarBtn.layer.borderColor = UIColor.grayColor().CGColor
        changeAvatarBtn.layer.borderWidth = 1
        changeAvatarBtn.layer.opaque = true
        changeAvatarBtn.addTarget(self, action: "changeAvatarTouchDown:", forControlEvents: .TouchDown)
        changeAvatarBtn.addTarget(self, action: "changeAvatar:", forControlEvents: .TouchUpInside)
        self.view.addSubview(changeAvatarBtn)
        
        
        let decorationBtnX = UIScreen.mainScreen().bounds.width / 2 + margin
        let decorationBtn = UIButton(frame: CGRect(x: decorationBtnX, y: changeAvatarBtnY, width: btnWidth, height: btnHeight))
        decorationBtn.setTitle("Decorate", forState: UIControlState.Normal)
        decorationBtn.opaque = true
        decorationBtn.layer.opaque = true
        decorationBtn.layer.cornerRadius = 13
        decorationBtn.layer.borderColor = UIColor.grayColor().CGColor
        decorationBtn.layer.borderWidth = 1
        self.view.addSubview(decorationBtn)
        
        
        
        let decorationY = UIScreen.mainScreen().bounds.width + UIApplication.sharedApplication().statusBarFrame.size.height
        let decorationHeight = UIScreen.mainScreen().bounds.height - decorationY
        
        let decorationBg = UIImageView(frame: CGRect(x: 0, y: decorationY, width: UIApplication.sharedApplication().statusBarFrame.width, height: decorationHeight))
        decorationBg.backgroundColor = UIColor.whiteColor()
        self.view.addSubview(decorationBg)
        
        
        let decorationNavHeight:CGFloat = 30
        let decorationNavY = UIScreen.mainScreen().bounds.height - decorationNavHeight
        
        let decorationNav = UIImageView(frame: CGRect(x: 0, y: decorationNavY, width: UIScreen.mainScreen().bounds.width, height: decorationNavHeight))
        decorationNav.backgroundColor = UIColor.lightGrayColor()
        self.view.addSubview(decorationNav)
        
        self.view.backgroundColor = UIColor.blackColor()
        self.view.tintColor = UIColor.whiteColor()
        UIApplication.sharedApplication().statusBarStyle = .LightContent
        
        self.view.sendSubviewToBack(avatarView)
        //self.view.sendSubviewToBack(avatarView)
        
        self.view.bringSubviewToFront(changeAvatarBtn)
        self.view.bringSubviewToFront(decorationBtn)
        self.view.bringSubviewToFront(backBtn)
        self.view.bringSubviewToFront(saveBtn)

        
        
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    
}


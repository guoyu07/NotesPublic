//
//  ViewController.swift
//  10.1.1 Photo - Avatar
//
//  Created by Aario on 3/9/16.
//  Copyright © 2016 Aario. All rights reserved.
//

import UIKit

class ViewController: UIViewController {
    var tapAvatarCounts: Int8 = 0
    var panAvatarLastTranslation: CGPoint = CGPoint(x: 0.0, y: 0.0)
    var displayLinkRunTimes:UInt8 = 0
    var displayLink: CADisplayLink!
    @IBOutlet weak var img: UIImageView!
    @IBOutlet weak var avatar: UIImageView!
    
    func avatarElastic() {
        displayLinkRunTimes++
        if(displayLinkRunTimes < 30) {      // 60HZ = 60 interval / sec
            let s:CGFloat = (30 - CGFloat(displayLinkRunTimes)) / CGFloat(30)
            self.avatar.center.y += self.panAvatarLastTranslation.y * s
            self.avatar.center.x += self.panAvatarLastTranslation.x * s

//            if (self.panAvatarLastTranslation.x != 0) {
//                if ((self.avatar.center.x + self.avatar.frame.width / 2) < (UIScreen.mainScreen().bounds.width  / 2) || (self.avatar.center.x - self.avatar.frame.width / 2) > UIScreen.mainScreen().bounds.width) {
//                    self.panAvatarLastTranslation.x = 0
//                }
//            }
//            if (self.panAvatarLastTranslation.y != 0) {
//                if ((self.avatar.center.y + self.avatar.frame.height / 2) < (UIApplication.sharedApplication().statusBarFrame.height + UIScreen.mainScreen().bounds.width  / 2) || (self.avatar.center.y - self.avatar.frame.height / 2) > (UIApplication.sharedApplication().statusBarFrame.height + UIScreen.mainScreen().bounds.width / 2)) {
//                    self.panAvatarLastTranslation.y = 0
//                }
//            }
            if (self.panAvatarLastTranslation.x == 0 && self.panAvatarLastTranslation.y == 0) {
                self.handleAvatarOutOfBounds()
                self.displayLink.paused = true
            }
            
        } else {
            self.handleAvatarOutOfBounds()
            displayLinkRunTimes = 0
            self.displayLink.paused = true
            //self.displayLink.invalidate()
        }
    }
    
    func handleAvatarOutOfBounds() {
        let debugOutOfBounds = false
        
        let standardAvatarBound: [String:CGFloat] = [
            "top": UIApplication.sharedApplication().statusBarFrame.height + UIScreen.mainScreen().bounds.width / 2 - Conf.Size.avatarRadius,
            "right": UIScreen.mainScreen().bounds.width / 2 + Conf.Size.avatarRadius,
            "bottom": UIApplication.sharedApplication().statusBarFrame.height + UIScreen.mainScreen().bounds.width / 2 + Conf.Size.avatarRadius,
            "left": UIScreen.mainScreen().bounds.width / 2 - Conf.Size.avatarRadius
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
            if (debugOutOfBounds) {
                print("Out of right bound")
            }
        }
        
        if(self.panAvatarLastTranslation.x > 0 && avatarBound["left"] > standardAvatarBound["left"]) {
            UIView.animateWithDuration(0.5, animations: {
                self.avatar.center.x -= (avatarBound["left"]! - standardAvatarBound["left"]!)
            })
            if (debugOutOfBounds) {
                print("Out of left bound")
            }
        }
        
        if(self.panAvatarLastTranslation.y > 0 && avatarBound["top"] > standardAvatarBound["top"]) {
            UIView.animateWithDuration(0.5, animations: {
                self.avatar.center.y -= (avatarBound["top"]! - standardAvatarBound["top"]!)
            })
            if (debugOutOfBounds) {
                print("Out of top bound")
            }
        }
        if(self.panAvatarLastTranslation.y < 0 && avatarBound["bottom"] < standardAvatarBound["bottom"]) {
            UIView.animateWithDuration(0.5, animations: {
                self.avatar.center.y += (standardAvatarBound["bottom"]! - avatarBound["bottom"]!)
            })
            if (debugOutOfBounds) {
                print("Out of bottom bound")
            }
        }
    }
    
    
    @IBAction func back(sender: UIButton) {
        
    }
    @IBAction func resizeAvatar(sender: UIImageView) {
        //print("Resize OK")
    }
    @IBAction func swipeAvatar(recognizer:UISwipeGestureRecognizer) {
        //print("swipe-avatar")
    }
    @IBAction func moveAvatar(recognizer:UIPanGestureRecognizer) {
        recognizer.maximumNumberOfTouches = 1
        recognizer.minimumNumberOfTouches = 1
        let debugGestureRecognizer = false
        let debugVelocity = false
        if (debugGestureRecognizer) {
            print("pan")
        }
        let translation = recognizer.translationInView(self.avatar)
        
        let standardAvatarSize:CGFloat = Conf.Size.avatarRadius * 2
        if (self.avatar.frame.width <  standardAvatarSize) {
            self.avatar.frame = CGRect(origin: self.avatar.frame.origin, size: CGSize(width: standardAvatarSize, height:standardAvatarSize))
        }
        if let view = recognizer.view {
            switch recognizer.state {
            case .Began:
                if (debugVelocity) {
                    print("Began: velocity: \(recognizer.velocityInView(view))  translation: \(translation)")
                }
                self.panAvatarLastTranslation = translation
                self.avatar.center = CGPoint(x: self.avatar.center.x + translation.x, y: self.avatar.center.y + translation.y)
            case .Changed:
                if (debugVelocity) {
                    print("Changed: velocity: \(recognizer.velocityInView(view))  translation: \(translation)")
                }
                if (translation != CGPoint(x: 0.0, y: 0.0)) {
                    self.panAvatarLastTranslation = translation
                }
                self.avatar.center = CGPoint(x: self.avatar.center.x + translation.x, y: self.avatar.center.y + translation.y)
            case .Ended:
                if (debugVelocity) {
                    print("Ended: velocity: \(recognizer.velocityInView(view))  translation: \(translation)")
                }
                var velocityDistance = sqrt(pow(recognizer.velocityInView(view).x, CGFloat(2)) + pow(recognizer.velocityInView(view).y, CGFloat(2)))
                print(velocityDistance)
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
        let radius: CGFloat = Conf.Size.avatarRadius
        
        // Create a path with the rectangle in it.
        let path = CGPathCreateMutable()
        let rect = CGRectMake(0, 0, range, range)
        CGPathMoveToPoint(path, nil, CGRectGetMinX(rect), CGRectGetMinY(rect))
        CGPathAddLineToPoint(path, nil, CGRectGetMaxX(rect), CGRectGetMinY(rect))
        CGPathAddLineToPoint(path, nil, CGRectGetMaxX(rect), CGRectGetMaxY(rect))
        CGPathAddLineToPoint(path, nil, CGRectGetMinX(rect), CGRectGetMaxY(rect))
        CGPathCloseSubpath(path)
        
        
        CGPathMoveToPoint(path, nil, range / 2 + radius, range / 2 + radius)
        
        CGPathAddArc(path, nil, range / 2, range / 2, radius, 0, 3.14 * 2, false)
        
        let maskLayer = CAShapeLayer()
        maskLayer.path = path
        maskLayer.backgroundColor = UIColor.whiteColor().CGColor
        maskLayer.fillColor = UIColor.whiteColor().CGColor
        maskLayer.fillRule = kCAFillRuleEvenOdd
        
        maskerView.alpha = 0.5
        maskerView.backgroundColor = UIColor.blackColor()
        self.view.addSubview(maskerView)
        maskerView.layer.mask = maskLayer
        
        maskerView.addGestureRecognizer(UIPanGestureRecognizer(target: self, action: "moveAvatar:"))
        maskerView.addGestureRecognizer(UIPinchGestureRecognizer(target: self, action: "resizeAvatar:"))
        maskerView.addGestureRecognizer(UITapGestureRecognizer(target: self, action: "resizeAvatar:"))
        maskerView.addGestureRecognizer(UISwipeGestureRecognizer(target: self, action: "swipeAvatar:"))
        


    }
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        
        displayLink = CADisplayLink(target: self, selector: "avatarElastic")
        displayLink.frameInterval = 1
        displayLink.paused = true
        displayLink.addToRunLoop(NSRunLoop.currentRunLoop(), forMode: NSRunLoopCommonModes)
        
        
        
        
        let statusBarBg = UIImageView(frame: CGRect(x:0, y:0, width: UIApplication.sharedApplication().statusBarFrame.size.width, height: UIApplication.sharedApplication().statusBarFrame.size.height))
        statusBarBg.backgroundColor = UIColor.blackColor()
        self.view.addSubview(statusBarBg)
        
        
        let backBtn = UIButton(frame: CGRect(origin: CGPointMake(10.0, 20.0), size: CGSizeMake(80, 30)))
        backBtn.setTitle("< Back", forState: UIControlState.Normal)
        backBtn.contentHorizontalAlignment = .Left
        backBtn.contentVerticalAlignment = .Center
        backBtn.addTarget(self, action: "back:", forControlEvents: UIControlEvents.TouchUpInside)
        self.view.addSubview(backBtn)
        
        let saveBtn = UIButton(frame: CGRect(x: UIScreen.mainScreen().bounds.width - 60, y: UIApplication.sharedApplication().statusBarFrame.height, width: 60, height: 30))
        saveBtn.setTitle("Save", forState: UIControlState.Normal)
        self.view.addSubview(saveBtn)
        
        let avatarView = UIImageView(image: UIImage(named: "long"))
        let avatarRange = UIScreen.mainScreen().bounds.width
        var avatarX:CGFloat = 0
        var avatarY: CGFloat = UIApplication.sharedApplication().statusBarFrame.height
        let avatarWidthDif =  avatarView.frame.width - avatarRange
        let avatarHeightDif =  avatarView.frame.height - avatarRange
        var avatarWidth:CGFloat = avatarRange
        var avatarHeight:CGFloat = avatarRange
        
        let avatarImgProportion = avatarView.frame.width / avatarView.frame.height
        
        if (avatarImgProportion == 1) {
            if(avatarWidthDif < 0) {
                avatarWidth = avatarView.frame.width
                avatarHeight = avatarWidth
                avatarX = -avatarWidthDif / 2
                avatarY = -avatarHeightDif / 2
            }
        } else if (avatarImgProportion > 1) {
            avatarHeight = avatarRange
            avatarWidth = avatarImgProportion * avatarRange
            avatarX += (avatarRange - avatarWidth) / 2
        } else {
            avatarWidth = avatarRange
            avatarHeight = avatarRange / avatarImgProportion
            avatarY += (avatarRange - avatarHeight) / 2
        }
        
        avatarView.frame = CGRect(x: avatarX, y: avatarY, width: avatarWidth, height: avatarHeight)
        
        avatarView.contentMode = .ScaleToFill
        avatarView.userInteractionEnabled = true
        //avatarView.alpha = 0.5
        avatarView.backgroundColor = UIColor.blackColor()
        avatarView.clipsToBounds = true
        maskAvatar()

        
        self.view.addSubview(avatarView)
        avatar = avatarView
        
        
        
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


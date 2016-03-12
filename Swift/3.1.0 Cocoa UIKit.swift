/**
 * Setting status bar tint color
 *  1. Add `View controller-based status bar appearance` in info.plist
 *  2. UIApplication.sharedApplication().statusBarStyle = .LightContent 
 */

/**
 * https://developer.apple.com/library/ios/documentation/UIKit/Reference/UIImageView_Class/index.html#//apple_ref/occ/cl/UIImageView
 */

color: UIColor
alpha: CGFloat  0.0...1.0
UIImageOrientation {Up,Down,Left,Right,?Mirrored}
UIImageResizingMode {Titl,Stretch}
UIViewTintAdjustmentMode {Automatic,Normal,Dimmed}
UIViewContentMode {ScaleToFill,ScaleAspectFit, ScaleAspectFill, Redraw,
                   Center,Top,Bottom,Left,Right,TopLeft,TopRight,BottomLeft,
                   BottomRight}



CGRect(x, y, width, height) -> UIImage

NSObject
#   UIView : NSObject
    UIView(frame: CGRect)
        /**
         * Configuring the Event-Related Behavior
         */
        .userInteractionEnabled: Bool
        .multipleTouchEnabled: Bool
        .exclusiveTouch: Bool
        
        .alpha .backgroundColor .hidden .opaque
        .tintColor .tintAdjustmentMode:UIViewTintAdjustmentMode

        // Conguring the Bounds and Frame Rectagles
        .frame: CGRect
        .bounds: CGRect
        .center: CGPoint
        .transform: CGAffineTransform

        // Managing the View Hierarchy/ˈhaɪərɑ:rki/
        .superview
        .subviews
        .window
        .addSubview(_:)
        .insertSubview(_:, [atIndex: Int | aboveSubview: | belowSubview:])
        .exchangeSubviewAtIndex(_ idx1: Int, withSubviewAtIndex idx2:Int)
        .bringSubviewToFront(_:)
        .sendSubviewToBack(_:)
        .removeFromSuperview()
        .isDescendantOfView(_:) -> Bool

        // Configuring the Resizing Behavior
        .autoresizingMask: UIViewAutoresizing
        .autoresizesSubviews: Bool
        .contentMode: UIViewContentMode
        .sizeThatFits(_:)
        .sizeToFit()
        
        
        .clipsToBounds
        .clearsContextBeforeDrawing
        .maskView
        .layer: CALayer { get}
        .layerClass()

        // Animating Views
        .animatedWithDuration(_ duration: NSTimeInterval  // in seconds
                              [, delay: NSTimeInterval]   // in seconds
                              [, :UIViewAnimationOptions]
                              animations: () -> Void
                              [, completion: ((Bool) -> Void?)]
##      UIImage : UIView : NSObject
        UIImage(filename: String[, NSBundle?, UITraitCollection?))
            .imageOrientation:UIImageOrientation .size:CGSize 
            .scale:CGFloat 
            .flipsForRightToLeftLayoutDirection
            .resizingMode:UIImageResizingMode
            .CGImage .CIImage .images .duration .capInsets
            .alignmentRectInsets .imageAsset .traitCollection .renderingMode
            drawAtPoint(:CGPoint[, :CGBlendMode, alpha])
            drawInRect(:CGRect[, :CGBlendMode, alpha])
            drawAsPatternInRect(:CGRect)
            
##      UIImageView : UIView : NSObject
        UIImageView(img: UIImage? [, highlightedImage: UIImage?])
            .layer
            .contentMode
            .userInteractionEnabled: Bool
            .clipsToBounds: Bool

            
        
 

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
        .init(frame: CGRect)
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
            .init(filename: String[, NSBundle?, UITraitCollection?])
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
            .init(img: UIImage? [, highlightedImage: UIImage?])
            .layer
            .contentMode
            .userInteractionEnabled: Bool
            .clipsToBounds: Bool

            
/**/
UIGestureRecognizerState {
    Possible,
    Began,      // to a continuous gesture
    Changed,    // to a continuous gesture
    Ended,      // to a continuous gesture
    Cancelled,
    Failed,
    static var Recognized: UIGestureRecognizerState { get }
}
/**/
#   UIGestureRecognizer : NSObject 
        .init(target: AnyObject?, action: Selector) -> UIGestureRecognizers
        .addTarget(_ target, action)
        .removeTarget(_ target?, action)
        // Recognizer's State and View
        .state: UIGestureRecognizerState { get }
        .view: UIView? { get }
        .enabled: Bool  whether the gesture recognizer is enabled
        // Canceling and Delaying Touches
        .cancelsTouchesInView: Bool
##      UILongPressGestureRecoginzer : UIGestureRecognizer
##      UIPanGestureRecognizer : UIGestureRecognizer   
        /**
         * A panning(dragging) gesture is continuous. It begins (UIGestureRecognizerStateBegan) when the minimum number of fingers allowed (minimumNumberOfTouches) has moved enough to be considered a pan. It changes (UIGestureRecognizerStateChanged) when a finger moves while at least the minimum number of fingers are pressed down. It ends (UIGestureRecognizerStateEnded) when all fingers are lifted.
         */
         .maximumNumberOfTouches   // max number of fingers
         .miniumNumberOfTouches
         // Tracking the Location and Velocity
         .translationInView(_:UIView?) -> CGPoint
         .setTranslation(_:CGPoint, inView:UIView)
         .velocityInView(_:UIView?) -> CGPoint   // point per second
###         UIScreenEdgePanGestureRecognizer : UIPanGestureRecognizer 
            : UIGestureRecognizer
            var edges: UIRectEdge   // the acceptable starting edges for
##      UIPinchGestureRecognizer
##      UIRotationGestureRecognizer
##      UISwipeGestureRecognizer
##      UITapGestureRecgonizer

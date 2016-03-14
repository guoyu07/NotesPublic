/**
 * Setting status bar tint color
 *  1. Add `View controller-based status bar appearance` in info.plist
 *  2. UIApplication.sharedApplication().statusBarStyle = .LightContent 
 */

/**
 * https://developer.apple.com/library/ios/documentation/UIKit/Reference/UIImageView_Class/index.html
 */

color: UIColor
alpha: CGFloat  0.0...1.0
UIImageResizingMode {Titl,Stretch}
UIViewTintAdjustmentMode {Automatic,Normal,Dimmed}
UIViewContentMode {ScaleToFill,ScaleAspectFit, ScaleAspectFill, Redraw,
                   Center,Top,Bottom,Left,Right,TopLeft,TopRight,BottomLeft,
                   BottomRight}



NSObject
#   UIResponder
##  UIView : UIReponder
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
    .layer: CALayer { get }
    .layerClass()

    // Animating Views
    .animateWithDuration(_ duration: NSTimeInterval  // in seconds
                          [, delay: NSTimeInterval]   // in seconds
                          [, :UIViewAnimationOptions]
                          animations: () -> Void
                          [, completion: ((Bool) -> Void?)]
    /**
     * usingSpringWithDamping
     *  1 no oscillation, to zero increase oscillation
     * initialSpringVelocity = total distance / velocity (as you want)
     *  For smooth start to the animation. E.g. If the distance is 100,
     *  and you want to match a view of velocity 50pt/s, use a value 0.5
     */
    .animateWithDuration(_ duration, delay
                         , usingSpringWithDamping: CGFloat
                         , initialSpringVelocity: CGFloat
                         , options: UIViewAnimationOptions,
                         , animations
                         , completion)
        
### UIImageView : UIView : NSObject
        .init(:UIImage? [, highlightedImage: UIImage?])
        .layer
        .contentMode
        .userInteractionEnabled: Bool
        .clipsToBounds: Bool

/**/
UIImageOrientation {Up,Down,Left,Right,?Mirrored}        
#   UIImage
        .init(named filename: String[, NSBundle?, UITraitCollection?])
        .init?(contentsOfFile:String) -> UIImage
        .init?(data:NSData) -> UIImage
        .init?(data:NSData, scale:CGFloat) -> UIImage
        
        /**
         *  scale: 
         *  orientation: 
         */
        .init(:CGImage[, scale:CGFloat, orientation:UIImageOrientation)
        .init(:CIImage[, scale, orientation])
        .imageOrientation:UIImageOrientation .size:CGSize 
        .scale:CGFloat 
        .flipsForRightToLeftLayoutDirection
        .resizingMode:UIImageResizingMode
        .CGImage .CIImage .images .duration .capInsets
        .alignmentRectInsets .imageAsset .traitCollection .renderingMode
        drawAtPoint(:CGPoint[, :CGBlendMode, alpha])
        drawInRect(:CGRect[, :CGBlendMode, alpha])
        drawAsPatternInRect(:CGRect)

            
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
##  UIPinchGestureRecognizer
##  UIRotationGestureRecognizer
##  UISwipeGestureRecognizer
##  UITapGestureRecgonizer

#   UIBezierPath : NSObject, NSCopying, NSCoding
        .init(rect:CGRect)  -> UIBezierPath
        .init(ovalInRect:CGRect)  -> UIBezierPath
        .init(rounderRect:CGRect, cornerRadius:CGFLoat) -> UIBezierPath
        .init(roundRect, byRoundingCorners:UIRectCorner, 
              cornerRadii: CGSize) -> UIBezierPath
        /**
         *   180 degree = M_PI radius
         */
        .init(arcCenter:CGPoint, radius: CGFloat, startAngle: UIBezierPath,
              endAngle:CGFloat, clockwise: Bool) -> UIBezierPath
        convenience init(:CGPath)
        .bezierPathByReversingPath() -> UIBezierPath
        // Constructing a Path
        .moveToPoint(_:CGPoint)
        .addLineToPoint(_:CGPoint)
        .addArcWithCenter(_ center, radius, startAngle, endAngle, clockwise)
        /**
         *  A cubic Bézier curve
         *        ■   controlPoint1
         *       /                    ●  endPoint
         *      /   ～ ～ ～       ～/ 
         *     /  ～          ～ ～ /
         *    ● ～                 ■  controlPoint2
         *  startPoint(using the moveToPoint)
         */
        .addCurveToPoint(_ endPoint:CGPoint, controlPoint1: CGPoint,
                         controlPoint2)
        
        

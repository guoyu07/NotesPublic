/**
 * @see https://developer.apple.com/library/ios/documentation/GraphicsImaging/Reference/QuartzCoreRefCollection/index.html
 */

NSObject
#   CALayer : NSObject
##      CADisplayLink
        /**
         * 60Hz = 60 times / sec
         */
        .init(target:AnyObject, :Selector) -> CADisplayLink
        .addToRunLoop(_:NSRunLoop, forMode:String)
        .removeFromRunLoop(_:NSRunLoop, forMode:String)
        .invalidate() // removes the display link from all run loop modes
        .paused: Bool       // whether the notifications are suspended
        .duration: CFTimeInterval { get }
        .frameInterval: Int
        .timestamp: CFTimeInterval { get }  // the last displayed frame 
##      CASharpLayer : CALayer : NSObject
            .path: CGPath?
            .fillColor: CGColor?
            .fillRule: String   
                kCAFillRuleNonZero
                kCAFillRuleEvenOdd

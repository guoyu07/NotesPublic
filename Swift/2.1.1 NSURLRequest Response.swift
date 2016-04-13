enum NSURLRequestCachePolicy : UInt {
    UseProtocolCachePolicy
    ReloadIgnoringLocalCacheData
    ReloadIgnoringLocalAndRemoteCacheData
    static var ReloadIgnoringCacheData: NSURLRequestCachePolicy { get }
    ReturnCacheDataElseLoad
    ReturnCacheDataDontLoad
    ReloadRevalidatingCacheData
}

# NSURLRequest : NSObject
    convenience .init(:NSURL)
    init(:NSURL, :NSURLRequestCachePolicy, timeoutInterval: NSTimeInterval)
    .cachePolicy: NSURLRequestCachePolicy { get }

    // whether the request should continue transmitting data before receiving a response from an earlier transmission. 
    .HTTPShouldUsePipelining: Bool { get }
    .mainDocumentURL: NSURL? { get }
    .timeoutInterval: NSTimeInterval { get }
    .networkServiceType: NSURLRequestNetworkServiceType { get }
    .URL: NSURL? { get }

    .allHTTPHeaderFields: [String : String]? { get }
    .HTTPBody: NSData? { get }
    .HTTPBodyStream: NSInputStream? { get }
    .HTTPMethod: String? { get }
    .HTTPShouldHandleCookies: Bool { get }
    .valueForHTTPHeaderField(_ field: String) -> String?
    .allowsCellularAccess : Bool { get }
    
## NSMutableURLRequest : NSURLRequest : NSObject


# NSCachedURLResponse
    .init(:NSURLResponse, :NSData)
    .init(:NSURLResponse, :NSData, userInfo: [NSObject : AnyObject]?, 
          :NSURLCacheStoragePolicy)
    
    .data: NSData { get }
    .response: NSURLResponse { get }
    .storagePolicy: NSURLCacheStoragePolicy { get }
    .userInfo: [NSObject : AnyObject]? { get }
    

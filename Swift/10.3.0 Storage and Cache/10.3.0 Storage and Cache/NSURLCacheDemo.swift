//
//  NSURLDemo.swift
//  10.3.0 Storage and Cache
//
//  Created by Aario on 4/13/16.
//  Copyright © 2016 Luexu.com. All rights reserved.
//

import UIKit
class NSURLCacheDemo : UIViewController {
    let url = NSURL(string: "https://api.github.com/users/AarioAi")!
    func request() {
        let request = NSMutableURLRequest(URL: url)
        request.cachePolicy = .ReturnCacheDataElseLoad

        let params = ["name" : "Aario"]
        let httpBody = NSKeyedArchiver.archivedDataWithRootObject(params)
        //print(httpBody)
        print(NSKeyedUnarchiver.unarchiveObjectWithData(httpBody))

        let cache = NSURLCache.sharedURLCache()
        let response = cache.cachedResponseForRequest(request)
        if response == nil {
            print("No cache")
        } else {
            print("Cache exists")
            print(NSKeyedUnarchiver.unarchiveObjectWithData(response!.data))
        }
        // cache.removeCachedResponseForRequest(request)
        
    }
    
    override func viewDidLoad() {
        super.viewDidLoad()
        view.backgroundColor = UIColor.whiteColor()
        
        request()
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
    }
}
//
//  TabBarController.swift
//  10.9.0 App with News, Chat, Cart and User
//
//  Created by Aario on 4/6/16.
//  Copyright © 2016 Luexu.com. All rights reserved.
//

import UIKit
class TabBarController: UITabBarController {
    override func viewDidLoad() {
        viewControllers = [IndexViewController(), ChatViewController(), CartViewController(), ShowViewController(), UserViewController()]
        
        for ctrl in viewControllers! {
            let _ = ctrl.view
        }
    }
}

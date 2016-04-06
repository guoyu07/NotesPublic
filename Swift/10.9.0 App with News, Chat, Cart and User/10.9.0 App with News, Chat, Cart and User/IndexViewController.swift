//
//  IndexViewController.swift
//  10.9.0 App with News, Chat, Cart and User
//
//  Created by Aario on 4/6/16.
//  Copyright © 2016 Luexu.com. All rights reserved.
//


import UIKit

class IndexViewController: UIViewController {
    
    override func viewDidLoad() {
        super.viewDidLoad()
        view.backgroundColor = UIColor.yellowColor()
        title="标题"
        //print(tabBarController == parentViewController)
        
        tabBarItem.title = "首页"
        
        
        tabBarItem.image = UIImage(named: Conf.Assets.TabBar.Index.normal)
        
        tabBarItem.selectedImage = UIImage(named: Conf.Assets.TabBar.Index.selected)
        
        // the red hint on the right-top
        //self.tabBarItem.badgeValue = "5"
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
}
//
//  UserViewController.swift
//  10.9.0 App with News, Chat, Cart and User
//
//  Created by Aario on 4/6/16.
//  Copyright © 2016 Luexu.com. All rights reserved.
//

import UIKit

class UserViewController: UIViewController {
    
    
    func tableViews() {
        _ = UITableViewController()
    }
    
  
    
        
    func tableView() {
        let userTableViewController = UserTableViewController()
        view.addSubview(userTableViewController.view)
    }
    
    override func viewDidLoad() {
        super.viewDidLoad()
        view.backgroundColor = UIColor.whiteColor()
        title="我的"
        //print(tabBarController == parentViewController)
        
        let t = UILabel(frame: CGRect(x: 100, y: 100, width: 50, height: 50))
        t.text = "DDD"
        view.addSubview(t)
        
        
        //topView()
        tableViews()
        
        let tableViewController = UserTableViewController()
        tableViewController.view.frame = CGRect(x:0, y:180, width: view.frame.width, height: 200)
        addChildViewController(tableViewController)
        view.addSubview(tableViewController.view)

    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
}
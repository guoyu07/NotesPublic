//
//  UserTableViewController.swift
//  10.9.0 App with News, Chat, Cart and User
//
//  Created by Aario on 4/7/16.
//  Copyright © 2016 Luexu.com. All rights reserved.
//

import UIKit
class UserTableViewController: UITableViewController {
    override func viewDidLoad() {
        super.viewDidLoad()
        let t = UILabel(frame: CGRect(x: 100, y: 100, width: 50, height: 50))
        t.text = "DDD----"
        view.addSubview(t)

    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
    }

}
//
//  ViewController.swift
//  10.3.0 Storage
//
//  Created by Aario on 3/23/16.
//  Copyright © 2016 Luexu.com. All rights reserved.
//

import UIKit
import SQLite


class ViewController: UIViewController {

    override func viewDidLoad() {
        super.viewDidLoad()
        let db = try Connection("path/to/db.sqlite3")

    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }


}


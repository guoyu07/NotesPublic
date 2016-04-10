//
//  UserTableViewController.swift
//  10.9.0 App with News, Chat, Cart and User
//
//  Created by Aario on 4/7/16.
//  Copyright © 2016 Luexu.com. All rights reserved.
//

import UIKit
class UserTableViewController: UITableViewController {
    
    
    var cells = [UserTableViewList]()
    
    //let avatarViewController
    let rowHeight: CGFloat = 90
    //var ulTableView = UITableView()
    let cellIdentifier = "UserTableViewCell"
    
    func loadData() {
        let photo1 = UIImage(named: "icon_album")!
        let cell1 = UserTableViewList(name: "我的订单", photo: photo1, rating: 4)!
        
        let photo2 = UIImage(named: "ic_g_airplane")!
        let cell2 = UserTableViewList(name: "我的财富", photo: photo2, rating: 5)!
        
        let photo3 = UIImage(named: "icon_credits")!
        let cell3 = UserTableViewList(name: "售后客服", photo: photo3, rating: 3)!
        
        
        let photo4 = UIImage(named: "ic_newseting")!
        let cell4 = UserTableViewList(name: "设置", photo: photo4, rating: 3)!
        
         cells += [cell1, cell2, cell3, cell4]
        tableView.reloadData()

    }
    override func viewDidLoad() {
        super.viewDidLoad()
        
        automaticallyAdjustsScrollViewInsets = false
        
        
        //let avatarViewController = UserAvatarViewController()
        //addChildViewController(avatarViewController)
        //tableView.addSubview(avatarViewController.view)
        
        
        
        
        //tableView.layoutMargins = UIEdgeInsets(top: 9, left:9, bottom: 9, right: 9)
        
       // tableView.contentInset = UIEdgeInsets(top: 9, left:9, bottom: 9, right: 9)

        tableView.rowHeight = Conf.Size.TableView.cellHeight + Conf.Size.TableView.cellMargins.top + Conf.Size.TableView.cellMargins.top
        
        tableView.backgroundColor = UIColor.lightGrayColor()
        tableView.separatorStyle = .None
        //tableView.cellLayoutMarginsFollowReadableWidth = false
        tableView.registerClass(UserTableViewCell.self, forCellReuseIdentifier: cellIdentifier)
        
        
        
        refreshControl = UIRefreshControl()
        
        refreshControl?.addTarget(self, action: #selector(UserTableViewController.refreshData), forControlEvents: .ValueChanged)
        refreshControl?.attributedTitle = NSAttributedString(string: "松开后自动刷新")
        tableView.addSubview(refreshControl!)
        //tableView.sendSubviewToBack(refreshControl!)
        
        let bg = UIImageView(image: UIImage(named: "img_loding1"))
        bg.frame = CGRectMake(tableView.frame.width - 8, 8, 16, 16)
        tableView.backgroundView = bg
        tableView.sendSubviewToBack(bg)

        
        
        loadData()
        
    }
    
    func refreshData() {
        print("refreshData")
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
    }
    // MARK: - Table view data source
    
    override func numberOfSectionsInTableView(tableView: UITableView) -> Int {
        return 1
    }
    //override func tableView(tableView: UITableView, heightForRowAtIndexPath indexPath: NSIndexPath) -> CGFloat {
   //     return 90
   // }

    
    override func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return cells.count
    }
    
    
    
    override func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        let cell = UserTableViewCell(style: .Default, reuseIdentifier: "userCell")
        let cellData = cells[indexPath.row]
        //cell.nameLabel.text = cellData.name
        
        cell.textLabel!.text = cellData.name
        
        cell.imageView!.image = cellData.photo
        
        //cell.imageView!.image =
        return cell
    }
    
    override func tableView(tableView: UITableView, didSelectRowAtIndexPath indexPath: NSIndexPath) {
        tableView.deselectRowAtIndexPath(indexPath, animated: true)
        
        let row = indexPath.row
        print(row)
        navigationController?.pushViewController(UserSignInViewController(), animated: true)
    }

    
    // Override to support conditional editing of the table view.
    override func tableView(tableView: UITableView, canEditRowAtIndexPath indexPath: NSIndexPath) -> Bool {
        // Return false if you do not want the specified item to be editable.
        return true
    }
    
    
    // Override to support editing the table view.
    override func tableView(tableView: UITableView, commitEditingStyle editingStyle: UITableViewCellEditingStyle, forRowAtIndexPath indexPath: NSIndexPath) {
        if editingStyle == .Delete {
            // Delete the row from the data source
           // meals.removeAtIndex(indexPath.row)
           // saveMeals()
            tableView.deleteRowsAtIndexPaths([indexPath], withRowAnimation: .Fade)
        } else if editingStyle == .Insert {
            // Create a new instance of the appropriate class, insert it into the array, and add a new row to the table view
        }
    }
    
    
    /*
     // Override to support rearranging the table view.
     override func tableView(tableView: UITableView, moveRowAtIndexPath fromIndexPath: NSIndexPath, toIndexPath: NSIndexPath) {
     
     }
     */
    
    /*
     // Override to support conditional rearranging of the table view.
     override func tableView(tableView: UITableView, canMoveRowAtIndexPath indexPath: NSIndexPath) -> Bool {
     // Return false if you do not want the item to be re-orderable.
     return true
     }
     */
    
}

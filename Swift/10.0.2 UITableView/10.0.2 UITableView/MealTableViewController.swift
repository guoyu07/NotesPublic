//
//  MealTableViewController.swift
//  FoodTracker
//
//  Created by Jane Appleseed on 5/27/15.
//  Copyright © 2015 Apple Inc. All rights reserved.
//  See LICENSE.txt for this sample’s licensing information.
//

import UIKit

class Singleton{            // swift 1.2+
    class var singletonInstance: Singleton {
        struct StaticStruct {
            static let instance: Singleton = Singleton()
        }
        return StaticStruct.instance
    }
    var verge: Int = 0
    func absurd() {
        print(verge)
    }
    init() {
        print(verge)
    }
}


class MealTableViewController: UITableViewController {
    // MARK: Properties
    
    var meals = [Meal]()
    var tableViewCellBg: UIImageView!

    override func viewDidLoad() {
        super.viewDidLoad()

        Singleton.singletonInstance.verge = 100     // print: 0
        let abdicate = Singleton()                  // init()    print: 0
        abdicate.verge = 1
        let abolish = Singleton()                   // init()   print: 0
        abolish.verge = 2
        
        print(Singleton.singletonInstance.verge)    // print: 100
        Singleton.singletonInstance.absurd()
        Singleton.singletonInstance.verge = 500         // no print!
        print(Singleton.singletonInstance.verge)    // print: 500
        Singleton.singletonInstance.absurd()
        
        // Load the sample data.
        loadSampleMeals()
    }
    
    func loadSampleMeals() {
        let photo1 = UIImage(named: "meal1")!
        let meal1 = Meal(name: "Caprese Salad", photo: photo1, rating: 4)!
        
        let photo2 = UIImage(named: "meal2")!
        let meal2 = Meal(name: "Chicken and Potatoes", photo: photo2, rating: 5)!
        
        let photo3 = UIImage(named: "meal3")!
        let meal3 = Meal(name: "Pasta with Meatballs", photo: photo3, rating: 3)!
        
        meals += [meal1, meal2, meal3]
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

    // MARK: - Table view data source

    override func numberOfSectionsInTableView(tableView: UITableView) -> Int {
        return 1
    }

    override func tableView(tableView: UITableView, numberOfRowsInSection section: Int) -> Int {
        return meals.count
    }

    override func tableView(tableView: UITableView, cellForRowAtIndexPath indexPath: NSIndexPath) -> UITableViewCell {
        // Table view cells are reused and should be dequeued using a cell identifier.
        let cellIdentifier = "MealTableViewCell"
        let cell = tableView.dequeueReusableCellWithIdentifier(cellIdentifier, forIndexPath: indexPath) as! MealTableViewCell
        
        
        
        // Fetches the appropriate meal for the data source layout.
        let meal = meals[indexPath.row]
        
        cell.nameLabel.text = "Aario: " + meal.name
        cell.photoImageView.image = meal.photo
        cell.ratingControl.rating = meal.rating
        
        
        /****************************** Test **********************************/
        
        tableView.allowsMultipleSelection = true
        tableView.separatorStyle = .SingleLine
        tableView.separatorColor = UIColor.blueColor()
        
        if tableViewCellBg == nil {
            tableViewCellBg = UIImageView(image: UIImage(named: "tableViewImageCellBg.jpg"))
            tableViewCellBg.frame.origin = CGPointZero
            tableViewCellBg.frame.size = tableView.frame.size
        }
        
        view.addSubview(tableViewCellBg)
        view.bringSubviewToFront(tableViewCellBg)
        
        tableView.backgroundView = tableViewCellBg
        tableView.cellLayoutMarginsFollowReadableWidth = false
        
        
        /*
        cell.editing = true
        cell.highlighted = true
        cell.userInteractionEnabled = true
         */
        
        
        
        //cell.selected = true
        //cell.showsReorderControl = true
        
        //cell.focusStyle = .Default
        
        cell.selectionStyle = .Blue
        //cell.highlighted = true

        //cell.indentationWidth = 20
        
        /****************************** Test End ******************************/

        
        return cell
    }

    /*
    // Override to support conditional editing of the table view.
    override func tableView(tableView: UITableView, canEditRowAtIndexPath indexPath: NSIndexPath) -> Bool {
        // Return false if you do not want the specified item to be editable.
        return true
    }
    */

    /*
    // Override to support editing the table view.
    override func tableView(tableView: UITableView, commitEditingStyle editingStyle: UITableViewCellEditingStyle, forRowAtIndexPath indexPath: NSIndexPath) {
        if editingStyle == .Delete {
            // Delete the row from the data source
            tableView.deleteRowsAtIndexPaths([indexPath], withRowAnimation: .Fade)
        } else if editingStyle == .Insert {
            // Create a new instance of the appropriate class, insert it into the array, and add a new row to the table view
        }    
    }
    */

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

    /*
    // MARK: - Navigation

    // In a storyboard-based application, you will often want to do a little preparation before navigation
    override func prepareForSegue(segue: UIStoryboardSegue, sender: AnyObject?) {
        // Get the new view controller using segue.destinationViewController.
        // Pass the selected object to the new view controller.
    }
    */

}

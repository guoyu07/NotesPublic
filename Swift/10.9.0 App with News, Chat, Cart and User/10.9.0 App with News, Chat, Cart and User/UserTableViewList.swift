//
//  10.9.0 App with News, Chat, Cart and User
//
//  Created by Aario on 4/10/16.
//  Copyright © 2016 Luexu.com. All rights reserved.
//

import UIKit

class UserTableViewList: NSObject, NSCoding {
    // MARK: Properties
    
    var nextViewController: UIViewController?
    
    var name: String
    var photo: UIImage?
    var cellBadgeValue: Int?
    
    // MARK: Archiving Paths
    
    static let DocumentsDirectory = NSFileManager().URLsForDirectory(.DocumentDirectory, inDomains: .UserDomainMask).first!
    static let ArchiveURL = DocumentsDirectory.URLByAppendingPathComponent("meals")
    
    // MARK: Types
    
    struct PropertyKey {
        static let nameKey = "name"
        static let photoKey = "photo"
        static let ratingKey = "rating"
    }
    
    // MARK: Initialization
    
    init?(name: String, photo: UIImage? = nil, nextViewController: UIViewController? = nil, cellBadgeValue: Int? = nil) {
        // Initialize stored properties.
        self.name = name
        self.photo = photo
        self.cellBadgeValue = cellBadgeValue
        self.nextViewController = nextViewController
        super.init()
        
    }
    
    // MARK: NSCoding
    
    func encodeWithCoder(aCoder: NSCoder) {

    }
    
    required convenience init?(coder aDecoder: NSCoder) {
        let name = "TEST"
        let photo = UIImage(named: "icon_xiro")
        self.init(name: name, photo: photo)
    }
    
}
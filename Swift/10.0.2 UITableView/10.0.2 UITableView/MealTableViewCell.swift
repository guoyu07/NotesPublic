//
//  MealTableViewCell.swift
//  10.0.2 UITableView
//
//  Created by Aario on 3/26/16.
//  Copyright © 2016 Luexu.com. All rights reserved.
//

import UIKit

class MealTableViewCell: UITableViewCell {
    
    
    @IBOutlet weak var nameLable: UITextField!
    
    
    @IBOutlet weak var ratingControl: UIView!
    
    @IBOutlet weak var photoImageView: UIImageView!
  
    
    
    
 
    
    
    override func awakeFromNib() {
        super.awakeFromNib()
        // Initialization code
    }

    override func setSelected(selected: Bool, animated: Bool) {
        super.setSelected(selected, animated: animated)

        // Configure the view for the selected state
    }

}

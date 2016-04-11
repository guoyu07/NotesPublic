//
//  UserAvatarTableViewCell.swift
//  10.9.0 App with News, Chat, Cart and User
//
//  Created by Aario on 4/11/16.
//  Copyright © 2016 Luexu.com. All rights reserved.
//


import UIKit
class UserHeaderLoginedTableViewCell: UITableViewCell {
    
    
    override init(style: UITableViewCellStyle, reuseIdentifier: String?) {
        super.init(style: style, reuseIdentifier: reuseIdentifier)
        
        backgroundColor = UIColor.whiteColor()
        contentView.addSubview(imageView!)
        
        contentView.addSubview(textLabel!)
        //contentView.addSubview(detailTextLabel!)
        

        imageView!.image = UIImage(named: "icon_xiro")!
        
    }
    required init?(coder aDecoder: NSCoder) {
        super.init(coder: aDecoder)
        //fatalError("init(coder:) has not been implemented")
    }
    
    override func drawRect(rect: CGRect) {
        let context = UIGraphicsGetCurrentContext()
        CGContextSetFillColorWithColor(context, UIColor.whiteColor().CGColor)
        CGContextFillRect(context, rect)
        CGContextSetStrokeColorWithColor(context, UIColor.init(red: 0xE2/255.0, green: 0xE2/255.0, blue: 0xE2/255.0, alpha: 1).CGColor)
        CGContextStrokeRect(context, CGRectMake(0, rect.size.height - 1, rect.size.width, 1))
        
    }
    override func layoutSubviews() {
        imageView!.frame = CGRectMake(0, 0, 90, 90)
        textLabel!.frame = CGRectMake(0, 0, 200, 20)
        //detailTextLabel!.frame = CGRectMake(0, 0, 300, 40)
    }
    
    
    
    override func awakeFromNib() {
        super.awakeFromNib()
        
        
        
    }
    
    override func setSelected(selected: Bool, animated: Bool) {
        super.setSelected(selected, animated: animated)
        
        // Configure the view for the selected state
    }

}
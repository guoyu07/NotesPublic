//
//  RatingControl.swift
//  10.0.2 UITableView
//
//  Created by Aario on 3/26/16.
//  Copyright © 2016 Luexu.com. All rights reserved.
//

import UIKit

class RatingControl: UIView {
    var rating = 0 {
        didSet {
            setNeedsLayout()
        }
    }
    var ratingButtons = [UIButton]()
    let spacing = 5
    let starCount = 5
    let stars = 5

    
    
    func ratingButtonTapped(button: UIButton) {
        print("ratingButtonTapped")
        rating = ratingButtons.indexOf(button)! + 1
        updateButtonSelectionStates()
    }
    func updateButtonSelectionStates() {
        for (index, button) in ratingButtons.enumerate() {
            button.selected = index < rating
        }
    }
    
    override func intrinsicContentSize() -> CGSize {
        let buttonSize = Int(frame.size.height)
        let width = (buttonSize * stars) + (spacing * (stars - 1))
        
        return CGSize(width: width, height: buttonSize)
    }

    override func layoutSubviews() {
        let buttonSize = Int(frame.size.height)
        var buttonFrame = CGRect(x: 0, y: 0, width: buttonSize, height: buttonSize)

        
        for (index, button) in ratingButtons.enumerate() {
            buttonFrame.origin.x = CGFloat(index * (buttonSize + 5))
            button.frame = buttonFrame
        }
        updateButtonSelectionStates()

    }
    
    
    required init?(coder aDecoder: NSCoder) {
        super.init(coder: aDecoder)
        
        let filledStarImage = UIImage(named: "filledStar")
        let emptyStarImage = UIImage(named: "emptyStar")
        
        
        for _ in 0..<starCount {
            let button = UIButton(frame: CGRect(x: 0, y: 0, width: 44, height: 44))
            //button.backgroundColor = UIColor.redColor()
            button.setImage(emptyStarImage, forState: .Normal)
            button.setImage(filledStarImage, forState: .Selected)
            button.setImage(filledStarImage, forState: [.Highlighted, .Selected])
            button.adjustsImageWhenHighlighted = false
            button.addTarget(self, action: #selector(RatingControl.ratingButtonTapped(_:)), forControlEvents: .TouchDown)
            ratingButtons += [button]
            addSubview(button)
        }
        
        

    }
    
//    init(name: String, photo: UIImage, rating: Int) {
//        
//    }

}

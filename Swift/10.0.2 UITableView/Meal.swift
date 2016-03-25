import UIKit
class Meal {
    let name: String
    let photo: UIImage?
    let rating: Int
    init?(name: String, photo: UIImage?, rating: Int) {
        self.name = name
        self.photo = photo
        self.rating = rating
        if name.isEmpty || rating < 0 {
            return nil              // init?()
        }
    }
}
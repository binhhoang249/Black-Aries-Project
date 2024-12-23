<?php
class AboutUs extends Controller {
    static function index() {
        $model = self::model("AboutUsModel");
        $businessData = $model->getInformationAboutUs();
        if (!empty($businessData) && isset($businessData[0])) {
            $business = $businessData[0];
            $businessName = $business['bussiness_name'];
            $description = $business['description'];
            $address = $business['address'];
            $contactNumber = $business['contact_number'];
            $email = $business['email'];
            $logo = $business['logo'];
            $image = $business['image'];
        } else {
            $businessName = "N/A";
            $description = "No description available.";
            $address = "No address available.";
            $contactNumber = "No contact number.";
            $email = "No email provided.";
            $logo = "default_logo.png";
            $image = "default_image.png";
        }
        self::view("pages/webViews/AboutUsPage", [
            "businessName" => $businessName,
            "description" => $description,
            "address" => $address,
            "contactNumber" => $contactNumber,
            "email" => $email,
            "logo" => $logo,
            "image" => $image,
        ]);
    }
}

?>

package model;

import java.io.Serializable;

public class Product implements Serializable {
    public int ID;
    public String ProductName;
    public Integer Price;
    public String Image;
    public String ProductDetail;
    public int ProductID;

    public Product(int ID, String productName, Integer price, String image, String productDetail, int productID) {
        this.ID = ID;
        ProductName = productName;
        Price = price;
        Image = image;
        ProductDetail = productDetail;
        ProductID = productID;
    }

    public int getID() {
        return ID;
    }

    public void setID(int ID) {
        this.ID = ID;
    }

    public String getProductName() {
        return ProductName;
    }

    public void setProductName(String productName) {
        ProductName = productName;
    }

    public Integer getPrice() {
        return Price;
    }

    public void setPrice(Integer price) {
        Price = price;
    }

    public String getImage() {
        return Image;
    }

    public void setImage(String image) {
        Image = image;
    }

    public String getProductDetail() {
        return ProductDetail;
    }

    public void setProductDetail(String productDetail) {
        ProductDetail = productDetail;
    }

    public int getProductID() {
        return ProductID;
    }

    public void setProductID(int productID) {
        ProductID = productID;
    }
}

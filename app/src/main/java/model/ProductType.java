package model;

public class ProductType {
    public int id;
    public String ProductTypeName;
    public String Image;

    public ProductType(int id, String productTypeName, String image) {
        this.id = id;
        ProductTypeName = productTypeName;
        Image = image;
    }

    public int getId() {
        return id;
    }

    public String getProductTypeName() {
        return ProductTypeName;
    }

    public String getImage() {
        return Image;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setProductTypeName(String productTypeName) {
        ProductTypeName = productTypeName;
    }

    public void setImage(String image) {
        Image = image;
    }
}

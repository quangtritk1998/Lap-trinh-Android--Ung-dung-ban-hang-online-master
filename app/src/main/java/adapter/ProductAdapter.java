package adapter;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.ntd.shopping.R;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.util.ArrayList;

import activity.ChiTietSanPham;
import model.Product;
import model.ProductType;
import util.CheckInternetConnection;

public class ProductAdapter extends RecyclerView.Adapter<ProductAdapter.ItemHolder>{
    Context context;
    ArrayList<Product> arrProduct;

    public ProductAdapter(Context context, ArrayList<Product> arrProduct) {
        this.context = context;
        this.arrProduct = arrProduct;
    }

    @Override
    public ItemHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.row_newproduct,null);
        ItemHolder itemHolder = new ItemHolder(view);
        return itemHolder;
    }

    @Override
    public void onBindViewHolder(ItemHolder holder, int position) {
        Product product = arrProduct.get(position);
        holder.ProductName.setText(product.getProductName());
        DecimalFormat decimalFormat = new DecimalFormat("###,###,###");
        holder.ProductPrice.setText("Giá "+ decimalFormat.format(product.getPrice())+"Đ");
        Picasso.with(context).load(product.getImage())
                .error(R.drawable.error)
                .into(holder.ProductImage);
    }

    @Override
    public int getItemCount() {
        return arrProduct.size();
    }

    public class ItemHolder extends RecyclerView.ViewHolder{
        public ImageView ProductImage;
        public TextView ProductName,ProductPrice;

        public ItemHolder(View itemView) {
            super(itemView);
            ProductImage = (ImageView) itemView.findViewById(R.id.imageviewproduct);
            ProductName = (TextView) itemView.findViewById(R.id.textviewproductname);
            ProductPrice = (TextView) itemView.findViewById(R.id.textviewproductprice);
            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent intent = new Intent(context,ChiTietSanPham.class);
                    intent.putExtra("productData",arrProduct.get(getPosition()));
                    CheckInternetConnection.ShowToast_Short(context,arrProduct.get(getPosition()).getProductName());
                    intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                    context.startActivity(intent);
                }
            });
        }
    }
}

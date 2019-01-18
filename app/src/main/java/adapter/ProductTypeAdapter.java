package adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.ntd.shopping.R;
import com.squareup.picasso.Picasso;

import org.w3c.dom.Text;

import java.util.ArrayList;

import model.ProductType;

public class ProductTypeAdapter extends BaseAdapter{
    ArrayList<ProductType> arrayListProductType;
    Context context;

    public ProductTypeAdapter(ArrayList<ProductType> arrayListProductType, Context context) {
        this.arrayListProductType = arrayListProductType;
        this.context = context;
    }

    @Override
    public int getCount() {
        return arrayListProductType.size();
    }

    @Override
    public Object getItem(int i) {
        return arrayListProductType.get(i);
    }

    @Override
    public long getItemId(int i) {
        return i;
    }
    public class ViewHolder{
        TextView textViewProductType;
        ImageView imageViewProductType;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        ViewHolder viewHolder = null;
        if(viewHolder==null){
            viewHolder = new ViewHolder();
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            view = inflater.inflate(R.layout.row_listview_producttype,null);
            viewHolder.textViewProductType = (TextView) view.findViewById(R.id.textviewproducttype);
            viewHolder.imageViewProductType = (ImageView) view.findViewById(R.id.imageviewproducttype);
            view.setTag(viewHolder);
        }
        else{
            viewHolder = (ViewHolder) view.getTag();

        }
        ProductType productType = (ProductType) getItem(i);
        viewHolder.textViewProductType.setText(productType.getProductTypeName());
        Picasso.with(context).load(productType.getImage())
                .error(R.drawable.error)
                .into(viewHolder.imageViewProductType);

        return view;
    }
}

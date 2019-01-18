package adapter;

import android.content.Context;
import android.text.TextUtils;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.ntd.shopping.R;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.util.ArrayList;

import model.Product;

public class LaptopAdapter extends BaseAdapter {
    Context context;
    ArrayList<Product> arraylaptop;

    public LaptopAdapter(Context context, ArrayList<Product> arraylaptop) {
        this.context = context;
        this.arraylaptop = arraylaptop;
    }

    @Override
    public int getCount() {
        return arraylaptop.size();
    }

    @Override
    public Object getItem(int i) {
        return arraylaptop.get(i);
    }

    @Override
    public long getItemId(int i) {
        return 0;
    }
    public class ViewHolder{
        public TextView txttenlaptop,txtgialaptop,txtmotalaptop;
        public ImageView imglaptop;
    }
    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        ViewHolder viewHolder=null;
        if(view==null)
        {
            viewHolder = new ViewHolder();
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            view = inflater.inflate(R.layout.dong_laptop,null);
            viewHolder.txttenlaptop = (TextView) view.findViewById(R.id.textviewlaptop);
            viewHolder.txtgialaptop = (TextView) view.findViewById(R.id.textviewgialaptop);
            viewHolder.txtmotalaptop = (TextView) view.findViewById(R.id.textviewmotalaptop);
            viewHolder.imglaptop= (ImageView) view.findViewById(R.id.imageviewlaptop);
            view.setTag(viewHolder);
        }
        else
        {
            viewHolder = (ViewHolder) view.getTag();
        }
        Product product = (Product) getItem(i);
        viewHolder.txttenlaptop.setText(product.getProductName());
        DecimalFormat decimalFormat = new DecimalFormat("###,###,###");
        viewHolder.txtgialaptop.setText("Giá "+ decimalFormat.format(product.getPrice())+"Đ");
        viewHolder.txtmotalaptop.setEllipsize(TextUtils.TruncateAt.END);
        viewHolder.txtmotalaptop.setText(product.getProductDetail());
        Picasso.with(context).load(product.getImage())
                .error(R.drawable.error)
                .into(viewHolder.imglaptop);
        return view;
    }
}

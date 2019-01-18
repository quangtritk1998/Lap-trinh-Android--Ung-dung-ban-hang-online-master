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

public class DienThoaiAdapter extends BaseAdapter{
    Context context;
    ArrayList<Product> arraydienThoai;

    public DienThoaiAdapter(Context context, ArrayList<Product> arraydienThoai) {
        this.context = context;
        this.arraydienThoai = arraydienThoai;
    }

    @Override
    public int getCount() {
        return arraydienThoai.size();
    }

    @Override
    public Object getItem(int i) {
        return arraydienThoai.get(i);
    }

    @Override
    public long getItemId(int i) {
        return i;
    }
    public class ViewHolder{
        public TextView txttendienthoai,txtgiadienthoai,txtmotadienthoai;
        public ImageView imgdienthoai;
    }
    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        ViewHolder viewHolder=null;
        if(view==null)
        {
            viewHolder = new ViewHolder();
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            view = inflater.inflate(R.layout.dong_dienthoai,null);
            viewHolder.txttendienthoai = (TextView) view.findViewById(R.id.textviewdienthoai);
            viewHolder.txtgiadienthoai = (TextView) view.findViewById(R.id.textviewgiadienthoai);
            viewHolder.txtmotadienthoai = (TextView) view.findViewById(R.id.textviewmotadienthoai);
            viewHolder.imgdienthoai= (ImageView) view.findViewById(R.id.imageviewdienthoai);
            view.setTag(viewHolder);
        }
        else
        {
            viewHolder = (ViewHolder) view.getTag();
        }
        Product product = (Product) getItem(i);
        viewHolder.txttendienthoai.setText(product.getProductName());
        DecimalFormat decimalFormat = new DecimalFormat("###,###,###");
        viewHolder.txtgiadienthoai.setText("Giá "+ decimalFormat.format(product.getPrice())+"Đ");
        viewHolder.txtmotadienthoai.setEllipsize(TextUtils.TruncateAt.END);
        viewHolder.txtmotadienthoai.setText(product.getProductDetail());
        Picasso.with(context).load(product.getImage())
                .error(R.drawable.error)
                .into(viewHolder.imgdienthoai);
        return view;
    }
}

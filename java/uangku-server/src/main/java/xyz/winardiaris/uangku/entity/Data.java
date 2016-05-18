package xyz.winardiaris.uangku.entity;

import java.util.Date;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import org.hibernate.annotations.GenericGenerator;

@Entity
public class Data {
    @Id @GeneratedValue(generator = "uuid")
    @GenericGenerator(name = "uuid", strategy = "uuid2")
    private String id;
    
    @Column(nullable = false)
    @Temporal(TemporalType.DATE)  
    private Date date_;
    
    @Column(nullable = false)
    private String token_;
    
    @Column(nullable = false,length=3)
    private String type_;
    
    @Column(nullable = false)
    private String value_;
    
    @Column(nullable = false)
    private String desc_;
    
    @Column(nullable = false,length = 1)
    private String status;
    
    @Column(nullable = false)
    @Temporal(TemporalType.TIMESTAMP)
    private Date c_at;
    
    @Column(nullable = false)
    @Temporal(TemporalType.TIMESTAMP)
    private Date u_at;
    
    @ManyToOne
    @JoinColumn(name="id_user", nullable = false)
    private User user;

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public Date getDate_() {
        return date_;
    }

    public void setDate_(Date date_) {
        this.date_ = date_;
    }

    public String getToken_() {
        return token_;
    }

    public void setToken_(String token_) {
        this.token_ = token_;
    }

    public String getType_() {
        return type_;
    }

    public void setType_(String type_) {
        this.type_ = type_;
    }

    public String getValue_() {
        return value_;
    }

    public void setValue_(String value_) {
        this.value_ = value_;
    }

    public String getDesc_() {
        return desc_;
    }

    public void setDesc_(String desc_) {
        this.desc_ = desc_;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public Date getC_at() {
        return c_at;
    }

    public void setC_at(Date c_at) {
        this.c_at = c_at;
    }

    public Date getU_at() {
        return u_at;
    }

    public void setU_at(Date u_at) {
        this.u_at = u_at;
    }

    public User getUser() {
        return user;
    }

    public void setUser(User user) {
        this.user = user;
    }
    
    
}

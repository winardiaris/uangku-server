package xyz.winardiaris.uangku.entity;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import org.hibernate.annotations.GenericGenerator;

@Entity
public class User {
    @Id @GeneratedValue(generator = "uuid")
    @GenericGenerator(name = "uuid", strategy = "uuid2")
    private String id;
    
    @Column(nullable = false,unique = true)
    private String username_;
    
    @Column(nullable = false)
    private String realname_;
    
    @Column(nullable = false)
    private String password_;
    
    @Column(nullable = false)
    @Temporal(TemporalType.TIMESTAMP)
    private Date lastlogin_;
    
    @Column(nullable = false)
    @Temporal(TemporalType.TIMESTAMP)
    private Date c_at;
    
    @Column(nullable = false)
    @Temporal(TemporalType.TIMESTAMP)
    private Date u_at;
    
    @OneToMany(
            mappedBy = "user",
            cascade = CascadeType.ALL,
            orphanRemoval = true
    )
    private List<Data> listData = new ArrayList<>();

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getUsername_() {
        return username_;
    }

    public void setUsername_(String username_) {
        this.username_ = username_;
    }

    public String getRealname_() {
        return realname_;
    }

    public void setRealname_(String realname_) {
        this.realname_ = realname_;
    }

    public String getPassword_() {
        return password_;
    }

    public void setPassword_(String password_) {
        this.password_ = password_;
    }

    public Date getLastlogin_() {
        return lastlogin_;
    }

    public void setLastlogin_(Date lastlogin_) {
        this.lastlogin_ = lastlogin_;
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

    public List<Data> getListData() {
        return listData;
    }

    public void setListData(List<Data> listData) {
        this.listData = listData;
    }
    
}
